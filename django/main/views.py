import datetime
from django.utils.timezone import utc

from django.http import HttpResponse, HttpResponseRedirect
from django.template import Template, Context
from django.shortcuts import render
from django.contrib import auth

from main.models import Client
from main.models import Contact
from main.models import Address
from main.models import State
from main.models import Team
from main.models import RecordType
from main.models import Record

from main.forms import CheckInForm
from main.forms import ClientForm
from main.forms import TeamForm

def calculateClientPoints(theClient):
    pointTotal = 0

    theRecords = Record.objects.filter(completedBy=theClient)

    for aRecord in theRecords:
        pointTotal = pointTotal + aRecord.points

    return pointTotal

def calculateTeamPoints(theTeam):
    pointTotal = 0
    theRecords = Record.objects.filter(teams__id=theTeam.id).distinct()

    for aRecord in theRecords:
        pointTotal = pointTotal + aRecord.points

    return pointTotal

def index(request):
    if request.user.is_authenticated():
        return HttpResponseRedirect("/clients/")

    context = {
        #'form': form,
    }

    return render(request, 'index.html', context)

def login(request):
    if request.user.is_authenticated():
        return HttpResponseRedirect("/")

    if request.method == 'POST':
        form = auth.forms.AuthenticationForm(data=request.POST)
        if form.is_valid():

            username = request.POST['username']
            password = request.POST['password']
            user = auth.authenticate(username=username, password=password)
            if user is not None:
                if user.is_active:
                    auth.login(request, user)
                    # Redirect to a success page.
                    return HttpResponseRedirect("/")
                else:
                    # Return a 'disabled account' error message
                    return HttpResponseRedirect("/login/")
    else:
        form = auth.forms.AuthenticationForm(request)

    context = {
        'form': form,
        #redirect_field_name: redirect_to,
        #'site': current_site,
        #'site_name': current_site.name,
    }

    return render(request, 'login.html', context)

def logout(request):
    auth.logout(request)
    # Redirect to a success page.
    return HttpResponseRedirect("/")

def viewClients(request):
    if not request.user.is_authenticated():
        return HttpResponseRedirect("/")

    theClients = Client.objects.all().order_by('lastName', 'firstName')

    context = {
        'clients': theClients,
    }

    return render(request, 'viewClients.html', context)

def addClient(request):
    if not request.user.is_authenticated():
        return HttpResponseRedirect("/")

    if request.method == 'POST': # If the form has been submitted...
        form = ClientForm(request.POST) # A form bound to the POST data
        if form.is_valid(): # All validation rules pass
            # Process the data in form.cleaned_data
            firstName = form.cleaned_data['firstName']
            middleName = form.cleaned_data['middleName']
            lastName = form.cleaned_data['lastName']
            dateOfBirth = form.cleaned_data['dateOfBirth']
            street = form.cleaned_data['street']
            city = form.cleaned_data['city']
            stateID = form.cleaned_data['state']
            zipCode = form.cleaned_data['zipCode']
            phone = form.cleaned_data['phone']
            email = form.cleaned_data['email']

            clientAddress = Address()
            clientAddress.street = street
            clientAddress.city = city
            theState = State.objects.filter(id=stateID)
            if len(theState)==1:
                theState = theState[0]
                clientAddress.state = theState
                clientAddress.zipCode = zipCode
                clientAddress.save()

                aClient = Client()
                aClient.firstName = firstName
                aClient.middleName = middleName
                aClient.lastName = lastName
                aClient.dateOfBirth = dateOfBirth
                aClient.address = clientAddress
                aClient.phone = phone
                aClient.email = email
                aClient.save()
            return HttpResponseRedirect('/clients/') # Redirect after POST
    else:
        form = ClientForm() # An unbound form

    context = {
        'form': form,
    }

    return render(request, 'addClient.html', context)

def viewClient(request, client_id):
    if not request.user.is_authenticated():
        return HttpResponseRedirect("/")

    theClient = Client.objects.filter(pk=client_id)
    if len(theClient) == 1:
        theClient = theClient[0]
    else:
        return HttpResponseRedirect("/")

    clientPoints = calculateClientPoints(theClient)

    theRecords = Record.objects.filter(completedBy=theClient).order_by('-date')[:5]

    theTeams = Team.objects.filter(members=theClient)

    for aTeam in theTeams:
        aTeam.points = calculateTeamPoints(aTeam)

    context = {
        'client': theClient,
        'clientPoints': clientPoints,
        'theRecords': theRecords,
        'theTeams': theTeams,
    }

    return render(request, 'viewClient.html', context)

def clientCheckin(request, client_id):
    if not request.user.is_authenticated():
        return HttpResponseRedirect("/")

    theClient = Client.objects.filter(pk=client_id)
    if len(theClient) == 1:
        theClient = theClient[0]
    else:
        return HttpResponseRedirect("/")

    if request.method == 'POST': # If the form has been submitted...
        form = CheckInForm(request.POST) # A form bound to the POST data
        if form.is_valid(): # All validation rules pass
            # Process the data in form.cleaned_data
            recordTypeId = form.cleaned_data['checkInType']
            theRecordType = RecordType.objects.filter(id=recordTypeId)
            if len(theRecordType)==1:
                theRecordType = theRecordType[0]

                theTeams = Team.objects.filter(members=theClient).filter(active=True)

                aRecord = Record()
                aRecord.name = theRecordType.name
                aRecord.points = theRecordType.points
                aRecord.date = datetime.datetime.utcnow().replace(tzinfo=utc)
                aRecord.completedBy = theClient
                aRecord.submittedBy = request.user
                aRecord.save()
                for aTeam in theTeams:
                    aRecord.teams.add(aTeam)
                        
            return HttpResponseRedirect('/clients/') # Redirect after POST
    else:
        form = CheckInForm() # An unbound form

    context = {
        'form': form,
        'client': theClient,
    }

    return render(request, 'checkInClient.html', context)

def viewTeams(request):
    if not request.user.is_authenticated():
        return HttpResponseRedirect("/")

    theTeams = Team.objects.filter(active=True).order_by('name')

    for aTeam in theTeams:
        aTeam.numMembers = aTeam.members.all().count()

    context = {
        'teams': theTeams,
    }

    return render(request, 'viewTeams.html', context)

def createTeam(request):
    if not request.user.is_authenticated():
        return HttpResponseRedirect("/")

    if request.method == 'POST': # If the form has been submitted...
        form = TeamForm(request.POST) # A form bound to the POST data
        if form.is_valid(): # All validation rules pass
            # Process the data in form.cleaned_data
            theName = form.cleaned_data['teamName']
            aTeam = Team()
            aTeam.name = theName
            aTeam.dateCreated = datetime.datetime.utcnow().replace(tzinfo=utc)
            aTeam.active = True
            aTeam.save()
            return HttpResponseRedirect('/team/edit/' + aTeam.id.__str__() + '/') # Redirect after POST
    else:
        form = TeamForm() # An unbound form

    context = {
        'form': form,
    }

    return render(request, 'createTeam.html', context)

def editTeam(request, team_id):
    if not request.user.is_authenticated():
        return HttpResponseRedirect("/")

    theTeam = Team.objects.filter(id=team_id)
    if len(theTeam) == 1:
        theTeam = theTeam[0]

        #Not allowed to edit inactive Team
        if theTeam.active == False:
            HttpResponseRedirect("/")

        teamMembers = theTeam.members.all().order_by('lastName', 'firstName')

        #notTeamMembers = Client.objects.all().exclude(id__in=teamMembers).order_by('lastName', 'firstName')

        membersNotOnATeam = Client.objects.filter(team__isnull=True)

    context = {
        'team': theTeam,
        'teamMembers': teamMembers,
        'notTeamMembers': membersNotOnATeam,
    }

    return render(request, 'editTeam.html', context)

def addTeamMember(request, team_id, client_id):
    if not request.user.is_authenticated():
        return HttpResponseRedirect("/")

    theTeam = Team.objects.filter(id=team_id)
    if len(theTeam) == 1:
        theTeam = theTeam[0]

        #Not allowed to edit inactive Team
        if theTeam.active == False:
            HttpResponseRedirect("/")

        theClient = Client.objects.filter(id=client_id)
        if len(theClient) == 1:
            theClient = theClient[0]

            theTeam.members.add(theClient)

    return HttpResponseRedirect('/team/edit/' + team_id + '/')

def removeTeamMember(request, team_id, client_id):
    if not request.user.is_authenticated():
        return HttpResponseRedirect("/")

    theTeam = Team.objects.filter(id=team_id)
    if len(theTeam) == 1:
        theTeam = theTeam[0]

        #Not allowed to edit inactive Team
        if theTeam.active == False:
            HttpResponseRedirect("/")

        theClient = Client.objects.filter(id=client_id)
        if len(theClient) == 1:
            theClient = theClient[0]

            theTeam.members.remove(theClient)
            
    return HttpResponseRedirect('/team/edit/' + team_id + '/')

def viewTeam(request, team_id):
    if not request.user.is_authenticated():
        return HttpResponseRedirect("/")

    theTeam = Team.objects.filter(id=team_id)
    if len(theTeam) == 1:
        theTeam = theTeam[0]

        teamMembers = theTeam.members.all().order_by('lastName', 'firstName')

    teamPoints = calculateTeamPoints(theTeam)

    context = {
        'teamPoints' : teamPoints,
        'team': theTeam,
        'teamMembers': teamMembers,
    }

    return render(request, 'viewTeam.html', context)
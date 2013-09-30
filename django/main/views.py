import datetime

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


def index(request):
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
                    return HttpResponseRedirect("/login")
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

    theClients = Client.objects.all().order_by('lastName', 'firstName')

    context = {
        'clients': theClients,
    }

    return render(request, 'viewClients.html', context)

def viewClient(request):
    if not request.user.is_authenticated():
        return HttpResponseRedirect("/")

    theClients = Client.objects.all().order_by('lastName', 'firstName')

    context = {
        'clients': theClients,
    }

    return render(request, 'viewClients.html', context)

def clientCheckin(request):
    if not request.user.is_authenticated():
        return HttpResponseRedirect("/")

    theClients = Client.objects.all().order_by('lastName', 'firstName')

    context = {
        'clients': theClients,
    }

    return render(request, 'viewClients.html', context)


from django import forms
from main.models import RecordType
from main.models import State

from crispy_forms.helper import FormHelper
from crispy_forms.layout import Layout, Fieldset, ButtonHolder, Submit

class CheckInForm(forms.Form):
    theRecordTypes = RecordType.objects.all().order_by('name')
    theTypes = list()
    for aRecord in theRecordTypes:
        theItem = (aRecord.id, aRecord.name.__str__() + ' Points: ' + aRecord.points.__str__())
        theTypes.append(theItem)
    checkInType = forms.ChoiceField(theTypes)
    #points = forms.EmailField()

    def __init__(self, *args, **kwargs):
        super(CheckInForm, self).__init__(*args, **kwargs)
        self.helper = FormHelper()
        self.helper.form_id = 'checkInForm'
        self.helper.form_method = 'post'
        self.helper.form_action = ''

        self.helper.form_class = 'form-horizontal'
        self.helper.label_class = 'col-xs-3 col-md-2'
        self.helper.field_class = 'col-xs-6 col-md-4'
        self.helper.layout = Layout(
            'checkInType',
        )

        self.helper.add_input(Submit('submit', 'Submit'))

class ClientForm(forms.Form):
    firstName = forms.CharField(max_length=50, label='First Name')
    middleName = forms.CharField(max_length=50, label='Middle Name', required=False)
    lastName = forms.CharField(max_length=50, label='Last Name')
    dateOfBirth = forms.DateField(label='Birthday')
    street = forms.CharField(max_length=200, label='Street')
    city = forms.CharField(max_length=200, label='City')

    theStates = State.objects.all().order_by('name')
    StatesList = list()
    for aState in theStates:
        theItem = (aState.id, aState.name)
        StatesList.append(theItem)
    state = forms.ChoiceField(StatesList, label='State')
    zipCode = forms.CharField(max_length=200, label='Zip Code')
    phone = forms.CharField(max_length=50, label='Phone Number')
    email = forms.EmailField(label='Email Address')

    def __init__(self, *args, **kwargs):
        super(ClientForm, self).__init__(*args, **kwargs)
        self.helper = FormHelper()
        self.helper.form_id = 'clientForm'
        self.helper.form_method = 'post'
        self.helper.form_action = ''

        self.helper.form_class = 'form-horizontal'
        self.helper.label_class = 'col-xs-3 col-md-2'
        self.helper.field_class = 'col-xs-6 col-md-4'
        self.helper.layout = Layout(
            'firstName',
            'middleName',
            'lastName',
            'dateOfBirth',
            'street',
            'city',
            'state',
            'zipCode',
            'phone',
            'email',
        )

        self.helper.add_input(Submit('submit', 'Submit'))

class TeamForm(forms.Form):
    teamName = forms.CharField(max_length=200, label='Team Name')

    def __init__(self, *args, **kwargs):
        super(TeamForm, self).__init__(*args, **kwargs)
        self.helper = FormHelper()
        self.helper.form_id = 'teamForm'
        self.helper.form_method = 'post'
        self.helper.form_action = ''

        self.helper.form_class = 'form-horizontal'
        self.helper.label_class = 'col-xs-3 col-md-2'
        self.helper.field_class = 'col-xs-6 col-md-4'
        self.helper.layout = Layout(
            'teamName',
        )

        self.helper.add_input(Submit('submit', 'Submit'))
from django.contrib import admin
from main.models import Client
from main.models import Contact
from main.models import Address
from main.models import State
from main.models import Team
from main.models import RecordType
from main.models import Record

admin.site.register(Client)
admin.site.register(Contact)
admin.site.register(Address)
admin.site.register(State)
admin.site.register(Team)
admin.site.register(RecordType)
admin.site.register(Record)
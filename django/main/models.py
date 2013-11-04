from django.db import models
from django.contrib.auth.models import User

class Client(models.Model):
    firstName = models.CharField(max_length=50)
    middleName = models.CharField(max_length=50, blank=True)
    lastName = models.CharField(max_length=50)
    dateOfBirth = models.DateField()
    address = models.ForeignKey('Address')
    phone = models.CharField(max_length=50)
    email = models.EmailField(max_length=254)
    guardians = models.ManyToManyField('Contact')

    def __unicode__(self):
        return self.lastName

class Contact(models.Model):
    firstName = models.CharField(max_length=50)
    middleName = models.CharField(max_length=50)
    lastName = models.CharField(max_length=50)
    dateOfBirth = models.DateField()
    address = models.ForeignKey('Address')
    phone = models.CharField(max_length=50)
    email = models.EmailField(max_length=254)

    def __unicode__(self):
        return self.lastName

class Address(models.Model):
    street = models.CharField(max_length=200)
    city = models.CharField(max_length=200)
    state = models.ForeignKey('State')
    zipCode = models.CharField(max_length=200)

    def __unicode__(self):
        return self.street

class State(models.Model):
    name = models.CharField(max_length=200)
    abbreviation = models.CharField(max_length=10)

    def __unicode__(self):
        return self.name

class Team(models.Model):
    name = models.CharField(max_length=200)
    dateCreated = models.DateTimeField()
    members = models.ManyToManyField('Client')
    active = models.BooleanField(default=True)

    def __unicode__(self):
        return self.name

class RecordType(models.Model):
    name = models.CharField(max_length=200)
    points = models.IntegerField()

    def __unicode__(self):
        return self.name

class Record(models.Model):
    name = models.CharField(max_length=200)
    points = models.IntegerField()
    date = models.DateTimeField()
    teams = models.ManyToManyField('Team', related_name='teams')
    completedBy = models.ForeignKey('Client', related_name='completedBy')
    submittedBy = models.ForeignKey(User)

    def __unicode__(self):
        return self.name
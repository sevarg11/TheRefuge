from django.conf.urls import patterns, url

from main import views

urlpatterns = patterns('',
    url(r'^$', views.index),
    url(r'^login/$', views.login),
    url(r'^logout/$', views.logout),
    url(r'^clients/$', views.viewClients),
    url(r'^client/add/$', views.addClient),
    url(r'^client/(?P<client_id>\d+)/$', views.viewClient),
    url(r'^client/(?P<client_id>\d+)/checkin/$', views.clientCheckin),
    url(r'^teams/$', views.viewTeams),
    url(r'^team/create/$', views.createTeam),
    url(r'^team/edit/(?P<team_id>\d+)/$', views.editTeam),
    url(r'^team/edit/(?P<team_id>\d+)/add/client/(?P<client_id>\d+)/$', views.addTeamMember),
    url(r'^team/edit/(?P<team_id>\d+)/remove/client/(?P<client_id>\d+)/$', views.removeTeamMember),
    url(r'^team/view/(?P<team_id>\d+)/$', views.viewTeam),
)
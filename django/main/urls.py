from django.conf.urls import patterns, url

from main import views

urlpatterns = patterns('',
    url(r'^$', views.index),
    url(r'^login/$', views.login),
    url(r'^logout/$', views.logout),
    url(r'^clients/$', views.viewClients),
    url(r'^clients/add/$', views.addClient),
    url(r'^client/(?P<client_id>\d+)/$', views.viewClient),
    url(r'^client/(?P<client_id>\d+)/checkin/$', views.clientCheckin),
)   
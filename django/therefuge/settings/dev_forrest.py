#settings/dev_forrest.py

#Command to run the server
# be in directory with manage.py
# python manage.py runserver --settings=therefuge.settings.dev_forrest

from .base import *

DEBUG = True
TEMPLATE_DEBUG = DEBUG

EMAIL_HOST = "localhost"
EMAIL_PORT = 1025

DATABASES = {
    'default': {
        'ENGINE': 'django.db.backends.postgresql_psycopg2',
        'NAME': 'capstone_db',
        'USER': 'capstone_login',
        'PASSWORD': 'thedatabasepassword',
        'HOST': 'localhost',
        'PORT': '',
    }
}

#INSTALLED_APPS += ("debug_toolbar", )

#MIDDLEWARE_CLASSES += ("debug_toolbar.middleware.DebugToolbarMiddleware", )

#CACHE_TIMEOUT = 30

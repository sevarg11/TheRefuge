#!/usr/bin/env python
# -*- coding: utf-8 -*-

# This file has been automatically generated.
# Instead of changing it, create a file called import_helper.py
# and put there a class called ImportHelper(object) in it.
#
# This class will be specially casted so that instead of extending object,
# it will actually extend the class BasicImportHelper()
#
# That means you just have to overload the methods you want to
# change, leaving the other ones inteact.
#
# Something that you might want to do is use transactions, for example.
#
# Also, don't forget to add the necessary Django imports.
#
# This file was generated with the following command:
# manage.py dumpscript main.State --settings=therefuge.settings.production
#
# to restore it, run
# manage.py runscript module_name.this_script_name
#
# example: if manage.py is at ./manage.py
# and the script is at ./some_folder/some_script.py
# you must make sure ./some_folder/__init__.py exists
# and run  ./manage.py runscript some_folder.some_script

from django.db import transaction

class BasicImportHelper(object):

    def pre_import(self):
        pass

    # You probably want to uncomment on of these two lines
    # @transaction.atomic  # Django 1.6
    # @transaction.commit_on_success  # Django <1.6
    def run_import(self, import_data):
        import_data()

    def post_import(self):
        pass

    def locate_similar(self, current_object, search_data):
        #you will probably want to call this method from save_or_locate()
        #example:
        #new_obj = self.locate_similar(the_obj, {"national_id": the_obj.national_id } )

        the_obj = current_object.__class__.objects.get(**search_data)
        return the_obj

    def locate_object(self, original_class, original_pk_name, the_class, pk_name, pk_value, obj_content):
        #You may change this function to do specific lookup for specific objects
        #
        #original_class class of the django orm's object that needs to be located
        #original_pk_name the primary key of original_class
        #the_class      parent class of original_class which contains obj_content
        #pk_name        the primary key of original_class
        #pk_value       value of the primary_key
        #obj_content    content of the object which was not exported.
        #
        #you should use obj_content to locate the object on the target db
        #
        #and example where original_class and the_class are different is
        #when original_class is Farmer and
        #the_class is Person. The table may refer to a Farmer but you will actually
        #need to locate Person in order to instantiate that Farmer
        #
        #example:
        #if the_class == SurveyResultFormat or the_class == SurveyType or the_class == SurveyState:
        #    pk_name="name"
        #    pk_value=obj_content[pk_name]
        #if the_class == StaffGroup:
        #    pk_value=8

        search_data = { pk_name: pk_value }
        the_obj = the_class.objects.get(**search_data)
        #print(the_obj)
        return the_obj


    def save_or_locate(self, the_obj):
        #change this if you want to locate the object in the database
        try:
            the_obj.save()
        except:
            print("---------------")
            print("Error saving the following object:")
            print(the_obj.__class__)
            print(" ")
            print(the_obj.__dict__)
            print(" ")
            print(the_obj)
            print(" ")
            print("---------------")

            raise
        return the_obj


importer = None
try:
    import import_helper
    #we need this so ImportHelper can extend BasicImportHelper, although import_helper.py
    #has no knowlodge of this class
    importer = type("DynamicImportHelper", (import_helper.ImportHelper, BasicImportHelper ) , {} )()
except ImportError as e:
    if str(e) == "No module named import_helper":
        importer = BasicImportHelper()
    else:
        raise

import datetime
from decimal import Decimal
from django.contrib.contenttypes.models import ContentType

def run():
    importer.pre_import()
    importer.run_import(import_data)
    importer.post_import()

def import_data():
    #initial imports

    #Processing model: State

    from main.models import State

    main_state_1 = State()
    main_state_1.name = u'Alabama'
    main_state_1.abbreviation = u'AL'
    main_state_1 = importer.save_or_locate(main_state_1)

    main_state_2 = State()
    main_state_2.name = u'Alaska'
    main_state_2.abbreviation = u'AK'
    main_state_2 = importer.save_or_locate(main_state_2)

    main_state_3 = State()
    main_state_3.name = u'Arizona'
    main_state_3.abbreviation = u'AZ'
    main_state_3 = importer.save_or_locate(main_state_3)

    main_state_4 = State()
    main_state_4.name = u'Arkansas'
    main_state_4.abbreviation = u'AR'
    main_state_4 = importer.save_or_locate(main_state_4)

    main_state_5 = State()
    main_state_5.name = u'California'
    main_state_5.abbreviation = u'CA'
    main_state_5 = importer.save_or_locate(main_state_5)

    main_state_6 = State()
    main_state_6.name = u'Colorado'
    main_state_6.abbreviation = u'CO'
    main_state_6 = importer.save_or_locate(main_state_6)

    main_state_7 = State()
    main_state_7.name = u'Connecticut'
    main_state_7.abbreviation = u'CT'
    main_state_7 = importer.save_or_locate(main_state_7)

    main_state_8 = State()
    main_state_8.name = u'Delaware'
    main_state_8.abbreviation = u'DE'
    main_state_8 = importer.save_or_locate(main_state_8)

    main_state_9 = State()
    main_state_9.name = u'Florida'
    main_state_9.abbreviation = u'FL'
    main_state_9 = importer.save_or_locate(main_state_9)

    main_state_10 = State()
    main_state_10.name = u'Georgia'
    main_state_10.abbreviation = u'GA'
    main_state_10 = importer.save_or_locate(main_state_10)

    main_state_11 = State()
    main_state_11.name = u'Hawaii'
    main_state_11.abbreviation = u'HI'
    main_state_11 = importer.save_or_locate(main_state_11)

    main_state_12 = State()
    main_state_12.name = u'Idaho'
    main_state_12.abbreviation = u'ID'
    main_state_12 = importer.save_or_locate(main_state_12)

    main_state_13 = State()
    main_state_13.name = u'Illinois'
    main_state_13.abbreviation = u'IL'
    main_state_13 = importer.save_or_locate(main_state_13)

    main_state_14 = State()
    main_state_14.name = u'Indiana'
    main_state_14.abbreviation = u'IN'
    main_state_14 = importer.save_or_locate(main_state_14)

    main_state_15 = State()
    main_state_15.name = u'Iowa'
    main_state_15.abbreviation = u'IA'
    main_state_15 = importer.save_or_locate(main_state_15)

    main_state_16 = State()
    main_state_16.name = u'Kansas'
    main_state_16.abbreviation = u'KS'
    main_state_16 = importer.save_or_locate(main_state_16)

    main_state_17 = State()
    main_state_17.name = u'Kentucky'
    main_state_17.abbreviation = u'KY'
    main_state_17 = importer.save_or_locate(main_state_17)

    main_state_18 = State()
    main_state_18.name = u'Louisiana'
    main_state_18.abbreviation = u'LA'
    main_state_18 = importer.save_or_locate(main_state_18)

    main_state_19 = State()
    main_state_19.name = u'Maine'
    main_state_19.abbreviation = u'ME'
    main_state_19 = importer.save_or_locate(main_state_19)

    main_state_20 = State()
    main_state_20.name = u'Maryland'
    main_state_20.abbreviation = u'MD'
    main_state_20 = importer.save_or_locate(main_state_20)

    main_state_21 = State()
    main_state_21.name = u'Massachusetts'
    main_state_21.abbreviation = u'MA'
    main_state_21 = importer.save_or_locate(main_state_21)

    main_state_22 = State()
    main_state_22.name = u'Michigan'
    main_state_22.abbreviation = u'MI'
    main_state_22 = importer.save_or_locate(main_state_22)

    main_state_23 = State()
    main_state_23.name = u'Minnesota'
    main_state_23.abbreviation = u'MN'
    main_state_23 = importer.save_or_locate(main_state_23)

    main_state_24 = State()
    main_state_24.name = u'Mississippi'
    main_state_24.abbreviation = u'MS'
    main_state_24 = importer.save_or_locate(main_state_24)

    main_state_25 = State()
    main_state_25.name = u'Missouri'
    main_state_25.abbreviation = u'MS'
    main_state_25 = importer.save_or_locate(main_state_25)

    main_state_26 = State()
    main_state_26.name = u'Montana'
    main_state_26.abbreviation = u'MT'
    main_state_26 = importer.save_or_locate(main_state_26)

    main_state_27 = State()
    main_state_27.name = u'Nebraska'
    main_state_27.abbreviation = u'NE'
    main_state_27 = importer.save_or_locate(main_state_27)

    main_state_28 = State()
    main_state_28.name = u'Nevada'
    main_state_28.abbreviation = u'NV'
    main_state_28 = importer.save_or_locate(main_state_28)

    main_state_29 = State()
    main_state_29.name = u'New Hampshire'
    main_state_29.abbreviation = u'NH'
    main_state_29 = importer.save_or_locate(main_state_29)

    main_state_30 = State()
    main_state_30.name = u'New Jersey'
    main_state_30.abbreviation = u'NJ'
    main_state_30 = importer.save_or_locate(main_state_30)

    main_state_31 = State()
    main_state_31.name = u'New Mexico'
    main_state_31.abbreviation = u'NM'
    main_state_31 = importer.save_or_locate(main_state_31)

    main_state_32 = State()
    main_state_32.name = u'New York'
    main_state_32.abbreviation = u'NY'
    main_state_32 = importer.save_or_locate(main_state_32)

    main_state_33 = State()
    main_state_33.name = u'North Carolina'
    main_state_33.abbreviation = u'NC'
    main_state_33 = importer.save_or_locate(main_state_33)

    main_state_34 = State()
    main_state_34.name = u'North Dakota'
    main_state_34.abbreviation = u'ND'
    main_state_34 = importer.save_or_locate(main_state_34)

    main_state_35 = State()
    main_state_35.name = u'Ohio'
    main_state_35.abbreviation = u'OH'
    main_state_35 = importer.save_or_locate(main_state_35)

    main_state_36 = State()
    main_state_36.name = u'Oklahoma'
    main_state_36.abbreviation = u'OK'
    main_state_36 = importer.save_or_locate(main_state_36)

    main_state_37 = State()
    main_state_37.name = u'Oregon'
    main_state_37.abbreviation = u'OR'
    main_state_37 = importer.save_or_locate(main_state_37)

    main_state_38 = State()
    main_state_38.name = u'Pennsylvania'
    main_state_38.abbreviation = u'PA'
    main_state_38 = importer.save_or_locate(main_state_38)

    main_state_39 = State()
    main_state_39.name = u'Rhode Island'
    main_state_39.abbreviation = u'RI'
    main_state_39 = importer.save_or_locate(main_state_39)

    main_state_40 = State()
    main_state_40.name = u'South Carolina'
    main_state_40.abbreviation = u'SC'
    main_state_40 = importer.save_or_locate(main_state_40)

    main_state_41 = State()
    main_state_41.name = u'South Dakota'
    main_state_41.abbreviation = u'SD'
    main_state_41 = importer.save_or_locate(main_state_41)

    main_state_42 = State()
    main_state_42.name = u'Tennessee'
    main_state_42.abbreviation = u'TN'
    main_state_42 = importer.save_or_locate(main_state_42)

    main_state_43 = State()
    main_state_43.name = u'Texas'
    main_state_43.abbreviation = u'TX'
    main_state_43 = importer.save_or_locate(main_state_43)

    main_state_44 = State()
    main_state_44.name = u'Utah'
    main_state_44.abbreviation = u'UT'
    main_state_44 = importer.save_or_locate(main_state_44)

    main_state_45 = State()
    main_state_45.name = u'Vermont'
    main_state_45.abbreviation = u'VT'
    main_state_45 = importer.save_or_locate(main_state_45)

    main_state_46 = State()
    main_state_46.name = u'Virginia'
    main_state_46.abbreviation = u'VA'
    main_state_46 = importer.save_or_locate(main_state_46)

    main_state_47 = State()
    main_state_47.name = u'Washington'
    main_state_47.abbreviation = u'WA'
    main_state_47 = importer.save_or_locate(main_state_47)

    main_state_48 = State()
    main_state_48.name = u'West Virginia'
    main_state_48.abbreviation = u'WV'
    main_state_48 = importer.save_or_locate(main_state_48)

    main_state_49 = State()
    main_state_49.name = u'Wisconsin'
    main_state_49.abbreviation = u'WI'
    main_state_49 = importer.save_or_locate(main_state_49)

    main_state_50 = State()
    main_state_50.name = u'Wyoming'
    main_state_50.abbreviation = u'WY'
    main_state_50 = importer.save_or_locate(main_state_50)


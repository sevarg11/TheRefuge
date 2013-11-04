# -*- coding: utf-8 -*-
import datetime
from south.db import db
from south.v2 import SchemaMigration
from django.db import models


class Migration(SchemaMigration):

    def forwards(self, orm):
        # Adding model 'Client'
        db.create_table(u'main_client', (
            (u'id', self.gf('django.db.models.fields.AutoField')(primary_key=True)),
            ('firstName', self.gf('django.db.models.fields.CharField')(max_length=50)),
            ('middleName', self.gf('django.db.models.fields.CharField')(max_length=50, blank=True)),
            ('lastName', self.gf('django.db.models.fields.CharField')(max_length=50)),
            ('dateOfBirth', self.gf('django.db.models.fields.DateField')()),
            ('address', self.gf('django.db.models.fields.related.ForeignKey')(to=orm['main.Address'])),
            ('phone', self.gf('django.db.models.fields.CharField')(max_length=50)),
            ('email', self.gf('django.db.models.fields.EmailField')(max_length=254)),
        ))
        db.send_create_signal(u'main', ['Client'])

        # Adding M2M table for field guardians on 'Client'
        m2m_table_name = db.shorten_name(u'main_client_guardians')
        db.create_table(m2m_table_name, (
            ('id', models.AutoField(verbose_name='ID', primary_key=True, auto_created=True)),
            ('client', models.ForeignKey(orm[u'main.client'], null=False)),
            ('contact', models.ForeignKey(orm[u'main.contact'], null=False))
        ))
        db.create_unique(m2m_table_name, ['client_id', 'contact_id'])

        # Adding model 'Contact'
        db.create_table(u'main_contact', (
            (u'id', self.gf('django.db.models.fields.AutoField')(primary_key=True)),
            ('firstName', self.gf('django.db.models.fields.CharField')(max_length=50)),
            ('middleName', self.gf('django.db.models.fields.CharField')(max_length=50)),
            ('lastName', self.gf('django.db.models.fields.CharField')(max_length=50)),
            ('dateOfBirth', self.gf('django.db.models.fields.DateField')()),
            ('address', self.gf('django.db.models.fields.related.ForeignKey')(to=orm['main.Address'])),
            ('phone', self.gf('django.db.models.fields.CharField')(max_length=50)),
            ('email', self.gf('django.db.models.fields.EmailField')(max_length=254)),
        ))
        db.send_create_signal(u'main', ['Contact'])

        # Adding model 'Address'
        db.create_table(u'main_address', (
            (u'id', self.gf('django.db.models.fields.AutoField')(primary_key=True)),
            ('street', self.gf('django.db.models.fields.CharField')(max_length=200)),
            ('city', self.gf('django.db.models.fields.CharField')(max_length=200)),
            ('state', self.gf('django.db.models.fields.related.ForeignKey')(to=orm['main.State'])),
            ('zipCode', self.gf('django.db.models.fields.CharField')(max_length=200)),
        ))
        db.send_create_signal(u'main', ['Address'])

        # Adding model 'State'
        db.create_table(u'main_state', (
            (u'id', self.gf('django.db.models.fields.AutoField')(primary_key=True)),
            ('name', self.gf('django.db.models.fields.CharField')(max_length=200)),
            ('abbreviation', self.gf('django.db.models.fields.CharField')(max_length=10)),
        ))
        db.send_create_signal(u'main', ['State'])

        # Adding model 'Team'
        db.create_table(u'main_team', (
            (u'id', self.gf('django.db.models.fields.AutoField')(primary_key=True)),
            ('name', self.gf('django.db.models.fields.CharField')(max_length=200)),
            ('dateCreated', self.gf('django.db.models.fields.DateTimeField')()),
        ))
        db.send_create_signal(u'main', ['Team'])

        # Adding M2M table for field members on 'Team'
        m2m_table_name = db.shorten_name(u'main_team_members')
        db.create_table(m2m_table_name, (
            ('id', models.AutoField(verbose_name='ID', primary_key=True, auto_created=True)),
            ('team', models.ForeignKey(orm[u'main.team'], null=False)),
            ('client', models.ForeignKey(orm[u'main.client'], null=False))
        ))
        db.create_unique(m2m_table_name, ['team_id', 'client_id'])

        # Adding model 'RecordType'
        db.create_table(u'main_recordtype', (
            (u'id', self.gf('django.db.models.fields.AutoField')(primary_key=True)),
            ('name', self.gf('django.db.models.fields.CharField')(max_length=200)),
            ('points', self.gf('django.db.models.fields.IntegerField')()),
        ))
        db.send_create_signal(u'main', ['RecordType'])

        # Adding model 'Record'
        db.create_table(u'main_record', (
            (u'id', self.gf('django.db.models.fields.AutoField')(primary_key=True)),
            ('name', self.gf('django.db.models.fields.CharField')(max_length=200)),
            ('points', self.gf('django.db.models.fields.IntegerField')()),
            ('date', self.gf('django.db.models.fields.DateTimeField')()),
            ('completedBy', self.gf('django.db.models.fields.related.ForeignKey')(related_name='completedBy', to=orm['main.Client'])),
            ('submittedBy', self.gf('django.db.models.fields.related.ForeignKey')(to=orm['auth.User'])),
        ))
        db.send_create_signal(u'main', ['Record'])

        # Adding M2M table for field members on 'Record'
        m2m_table_name = db.shorten_name(u'main_record_members')
        db.create_table(m2m_table_name, (
            ('id', models.AutoField(verbose_name='ID', primary_key=True, auto_created=True)),
            ('record', models.ForeignKey(orm[u'main.record'], null=False)),
            ('client', models.ForeignKey(orm[u'main.client'], null=False))
        ))
        db.create_unique(m2m_table_name, ['record_id', 'client_id'])


    def backwards(self, orm):
        # Deleting model 'Client'
        db.delete_table(u'main_client')

        # Removing M2M table for field guardians on 'Client'
        db.delete_table(db.shorten_name(u'main_client_guardians'))

        # Deleting model 'Contact'
        db.delete_table(u'main_contact')

        # Deleting model 'Address'
        db.delete_table(u'main_address')

        # Deleting model 'State'
        db.delete_table(u'main_state')

        # Deleting model 'Team'
        db.delete_table(u'main_team')

        # Removing M2M table for field members on 'Team'
        db.delete_table(db.shorten_name(u'main_team_members'))

        # Deleting model 'RecordType'
        db.delete_table(u'main_recordtype')

        # Deleting model 'Record'
        db.delete_table(u'main_record')

        # Removing M2M table for field members on 'Record'
        db.delete_table(db.shorten_name(u'main_record_members'))


    models = {
        u'auth.group': {
            'Meta': {'object_name': 'Group'},
            u'id': ('django.db.models.fields.AutoField', [], {'primary_key': 'True'}),
            'name': ('django.db.models.fields.CharField', [], {'unique': 'True', 'max_length': '80'}),
            'permissions': ('django.db.models.fields.related.ManyToManyField', [], {'to': u"orm['auth.Permission']", 'symmetrical': 'False', 'blank': 'True'})
        },
        u'auth.permission': {
            'Meta': {'ordering': "(u'content_type__app_label', u'content_type__model', u'codename')", 'unique_together': "((u'content_type', u'codename'),)", 'object_name': 'Permission'},
            'codename': ('django.db.models.fields.CharField', [], {'max_length': '100'}),
            'content_type': ('django.db.models.fields.related.ForeignKey', [], {'to': u"orm['contenttypes.ContentType']"}),
            u'id': ('django.db.models.fields.AutoField', [], {'primary_key': 'True'}),
            'name': ('django.db.models.fields.CharField', [], {'max_length': '50'})
        },
        u'auth.user': {
            'Meta': {'object_name': 'User'},
            'date_joined': ('django.db.models.fields.DateTimeField', [], {'default': 'datetime.datetime.now'}),
            'email': ('django.db.models.fields.EmailField', [], {'max_length': '75', 'blank': 'True'}),
            'first_name': ('django.db.models.fields.CharField', [], {'max_length': '30', 'blank': 'True'}),
            'groups': ('django.db.models.fields.related.ManyToManyField', [], {'to': u"orm['auth.Group']", 'symmetrical': 'False', 'blank': 'True'}),
            u'id': ('django.db.models.fields.AutoField', [], {'primary_key': 'True'}),
            'is_active': ('django.db.models.fields.BooleanField', [], {'default': 'True'}),
            'is_staff': ('django.db.models.fields.BooleanField', [], {'default': 'False'}),
            'is_superuser': ('django.db.models.fields.BooleanField', [], {'default': 'False'}),
            'last_login': ('django.db.models.fields.DateTimeField', [], {'default': 'datetime.datetime.now'}),
            'last_name': ('django.db.models.fields.CharField', [], {'max_length': '30', 'blank': 'True'}),
            'password': ('django.db.models.fields.CharField', [], {'max_length': '128'}),
            'user_permissions': ('django.db.models.fields.related.ManyToManyField', [], {'to': u"orm['auth.Permission']", 'symmetrical': 'False', 'blank': 'True'}),
            'username': ('django.db.models.fields.CharField', [], {'unique': 'True', 'max_length': '30'})
        },
        u'contenttypes.contenttype': {
            'Meta': {'ordering': "('name',)", 'unique_together': "(('app_label', 'model'),)", 'object_name': 'ContentType', 'db_table': "'django_content_type'"},
            'app_label': ('django.db.models.fields.CharField', [], {'max_length': '100'}),
            u'id': ('django.db.models.fields.AutoField', [], {'primary_key': 'True'}),
            'model': ('django.db.models.fields.CharField', [], {'max_length': '100'}),
            'name': ('django.db.models.fields.CharField', [], {'max_length': '100'})
        },
        u'main.address': {
            'Meta': {'object_name': 'Address'},
            'city': ('django.db.models.fields.CharField', [], {'max_length': '200'}),
            u'id': ('django.db.models.fields.AutoField', [], {'primary_key': 'True'}),
            'state': ('django.db.models.fields.related.ForeignKey', [], {'to': u"orm['main.State']"}),
            'street': ('django.db.models.fields.CharField', [], {'max_length': '200'}),
            'zipCode': ('django.db.models.fields.CharField', [], {'max_length': '200'})
        },
        u'main.client': {
            'Meta': {'object_name': 'Client'},
            'address': ('django.db.models.fields.related.ForeignKey', [], {'to': u"orm['main.Address']"}),
            'dateOfBirth': ('django.db.models.fields.DateField', [], {}),
            'email': ('django.db.models.fields.EmailField', [], {'max_length': '254'}),
            'firstName': ('django.db.models.fields.CharField', [], {'max_length': '50'}),
            'guardians': ('django.db.models.fields.related.ManyToManyField', [], {'to': u"orm['main.Contact']", 'symmetrical': 'False'}),
            u'id': ('django.db.models.fields.AutoField', [], {'primary_key': 'True'}),
            'lastName': ('django.db.models.fields.CharField', [], {'max_length': '50'}),
            'middleName': ('django.db.models.fields.CharField', [], {'max_length': '50', 'blank': 'True'}),
            'phone': ('django.db.models.fields.CharField', [], {'max_length': '50'})
        },
        u'main.contact': {
            'Meta': {'object_name': 'Contact'},
            'address': ('django.db.models.fields.related.ForeignKey', [], {'to': u"orm['main.Address']"}),
            'dateOfBirth': ('django.db.models.fields.DateField', [], {}),
            'email': ('django.db.models.fields.EmailField', [], {'max_length': '254'}),
            'firstName': ('django.db.models.fields.CharField', [], {'max_length': '50'}),
            u'id': ('django.db.models.fields.AutoField', [], {'primary_key': 'True'}),
            'lastName': ('django.db.models.fields.CharField', [], {'max_length': '50'}),
            'middleName': ('django.db.models.fields.CharField', [], {'max_length': '50'}),
            'phone': ('django.db.models.fields.CharField', [], {'max_length': '50'})
        },
        u'main.record': {
            'Meta': {'object_name': 'Record'},
            'completedBy': ('django.db.models.fields.related.ForeignKey', [], {'related_name': "'completedBy'", 'to': u"orm['main.Client']"}),
            'date': ('django.db.models.fields.DateTimeField', [], {}),
            u'id': ('django.db.models.fields.AutoField', [], {'primary_key': 'True'}),
            'members': ('django.db.models.fields.related.ManyToManyField', [], {'related_name': "'members'", 'symmetrical': 'False', 'to': u"orm['main.Client']"}),
            'name': ('django.db.models.fields.CharField', [], {'max_length': '200'}),
            'points': ('django.db.models.fields.IntegerField', [], {}),
            'submittedBy': ('django.db.models.fields.related.ForeignKey', [], {'to': u"orm['auth.User']"})
        },
        u'main.recordtype': {
            'Meta': {'object_name': 'RecordType'},
            u'id': ('django.db.models.fields.AutoField', [], {'primary_key': 'True'}),
            'name': ('django.db.models.fields.CharField', [], {'max_length': '200'}),
            'points': ('django.db.models.fields.IntegerField', [], {})
        },
        u'main.state': {
            'Meta': {'object_name': 'State'},
            'abbreviation': ('django.db.models.fields.CharField', [], {'max_length': '10'}),
            u'id': ('django.db.models.fields.AutoField', [], {'primary_key': 'True'}),
            'name': ('django.db.models.fields.CharField', [], {'max_length': '200'})
        },
        u'main.team': {
            'Meta': {'object_name': 'Team'},
            'dateCreated': ('django.db.models.fields.DateTimeField', [], {}),
            u'id': ('django.db.models.fields.AutoField', [], {'primary_key': 'True'}),
            'members': ('django.db.models.fields.related.ManyToManyField', [], {'to': u"orm['main.Client']", 'symmetrical': 'False'}),
            'name': ('django.db.models.fields.CharField', [], {'max_length': '200'})
        }
    }

    complete_apps = ['main']
### Conference

### Page
## Homepage
## Register
User registration will post to validate process, that will send user email 6 random int code. If user input correct number then data registration will
store in table user in database.
## Login
User data login will check is valid or not with basic laraval function(Auth class), it will return if email not listed in user table or not correct passwort.
## Setting
Is page that user can change their Name and Roll if they want to be speaker.
## Dashboard
this page will show event that user will join, or for speaker it will show their event too, and only speaker can edit their event.
## add event
page add event can be acces by role speaker. there are form that spekaer need to input like title, desc, date, time and data that will be in event(data can be pdf or ppt),
user will chose list of date and room from database, and time will show after user choos room and date and option will show with help of ajax


## backup database in specific time

### Database
# Users
table user have attribut id, timestamp, name, email(unique), password and role. By default register user will have role 2(participan), but it can be change in setting if user want to be a speaker.
# Room
table room is list of room that can be choose for event by speaker.
this table have attribut id, timestamps, room_name, and room_number.
# Time
this table is list of time that define by admin. this table have attribut id,timestamps,time_event.
# roll
this table contain 2 data, first admin with code number 666666,
and Speaker with code 333333, code from this table can be use to change role user in setting.
# Events
table events have attribut:
id, timestamps, title, speaker, description, date, time and data(pdf or ppt).
# event
table event will create when spaker add new event with title event as table name, and it will contain attribut id, timestamps, user.
# pastevent
# subscribe



### Function
## Register and Login with Activation code per mail
## give Role speaker with code
# admin code 666666
# speaker code 333333
## dashboard admin, speaker and user
## let speaker can upload file pdf, ppt and select schedule and room
## Homepage show upcoming schedule leacture
## Participan can choose room and time
## search 
# room or lecture
## notification 
# if leacture will start soon with task scheduling


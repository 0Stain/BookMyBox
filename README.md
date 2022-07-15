
# BookMyBox

BookMyBox is a room booking management system developed for Medianet. The purpose of this web app is to allow Medianet employees to easily check the availability and book one of the boxes for a meeting without overlapping with other employees.



## Project and Company Background

Medianet is a Web, Mobile, and digital communication agency.
The number of employees has been increasing rapidly in the past few months which has caused conflicts in booking the boxes a.k.a meeting rooms
for everyone in the company, thus the urgent need for this system.


## Models

User :
- id_user (int)(pk)
- user_name (string)
- email (string)
- password(string)(bcrypt for pwd hashing)

Box :
- id_box (int)(pk)
- box_name (string)(unique)

Booking :
- id_booking (int)(pk)
- t_start(date)
- t_end(date)
- id_user(fk)
- id_box (fk)


## Tech Stack

**Client:** Vue, TailwindCSS

**Server:** Laravel


## Authors

- [@0Stain](https://github.com/0Stain)


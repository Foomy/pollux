# Pollux - Personal Media Library

## Introduction

Were you ever in a store and thought: "Did I already have this flick in my DVD collection?", or have you ever
bought a new blu-ray only to realize at home you now own it twice? Well, it happened to me, and not only once.
And that's where Pollux comes in, my personal solution to my very personal problem: My weird brain.

The main purpose of this is to help manage your medias like DVD, blu-ray or books.

If you're asking yourself now: "For Mike's sake, who the heck has still books, blu-rays or even DVDs at home?" -
Well I guess this tool isn't for you. - I admit, I build this primarily for me, but if some other dudes like and
use it once it is finished, I'm glad.

## The Plan

### General Architecture

The idea is to manage a database with a web application and then access it via a mobile device.
That implies the general architecture is split into several main parts.

* The backend application which provides an api.
* The web frontend application for usage in all modern browsers to manage the data.
* The mobile app (read only module).

#### The Backend

* REST API
* Programming language TBD

#### The Web Frontend

* Plain ECMA-Script

#### Mobile App 

* Android App
* Must work without net connection
* DB-Sync via WiFi

### More features in consideration

* Barcode scanner.
* Web scraper.

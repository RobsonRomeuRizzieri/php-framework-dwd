<?php

# configuration file: adjust the '$calpath', your database-connection, then it works !
# after that you're free to adjust all other vars


############################################################################
#
# base dir (include ending slash !), on win use two '\\', on linux/unix just '/' */

$calpath = "";


############################################################################
#
# Calendar admin authorisation
# 1 = yes, 0 = no

$calauth = 1;

############################################################################
#
# language
#
# e  -> english
# n  -> dutch
# fr -> french
# g  -> german
# k  -> korean
# a  -> arabic
# es -> español
# i  -> italian
# pb -> portugues brasil

$language = 'pb';

# don't change next 3 lines !
require $calpath."cal_languages/".$language.".inc.php";
require $calpath."cal_languages/".$language.".months.php";
require $calpath."cal_languages/".$language.".week.php";


############################################################################
#
# default view
#
# this is the default you get when just surfing to index.php
#
# 0 = todayview
# 1 = weekview
# 2 = monthview

$caldefault = '2';


############################################################################
#
# (non) views
#
# set several things (url, search) on/off on the 'live' site
# 1 is on, 0 is off

$popupevent = '1'; // is event in popup-screen(1) or just url(0)
$popupeventheight = '400'; // height of the popup-screen
$popupeventwidth = '400';  // width of the popup-screen

$caleventapprove = '0'; // approve events given in by site-user; 0 = yes, 1 = no
$caleventadminapprove = '0'; // approve events by admin-user; 0 = yes, 1 = no

$addeventok = '1'; // 'add event - url'
$viewcatsok = '1'; // 'view categories - url'
$viewdayok = '1';  // 'view by day - url'
$viewweekok = '1'; // 'view by week - url'
$viewcalok = '1';  // 'view month -  url'

$vieweventok = '1';     // search on view individual view
$searchcatsok = '1';    // search on overview of categories
$searchscatviews = '1'; // search on overview of events in 1 category
$searchdayok = '1';     // search on view events by day
$searchweekok = '1';    // search on view events by week
$searchmonthok = '1';   // search on view events by month

$viewtodaydate = '1';   // view today date at the top

############################################################################
#
# colors for the 'live site'

# background gcolor
$bgcolor = '#FFFFFF';

# vars for categories
# two colors because the <tr>'s alternate
$firstcatcolor = '#BBBBBB';
$secondcatcolor = '#DDDDDD';

# vars for event from one category
# two colors, because the colors alternate
$firstcatevcolor = '#BBBBBB';
$secondcatevcolor = '#DDDDDD';

# vars for calendar-month-view
$tablewidth = '100%'; // width of table
$monthborder = '0'; // tableborder or not
$tdwidth = '14%'; // width of cell
$tdtopheight = '30'; // standard height of top cell
$tddayheight = '50'; // standar height of weekday-cell
$tdheight = '50'; // standard height of day-cell
$calcells = '0'; // cellspacing
$calcellp = '0'; // cellpadding
$trtopcolor = '#AEC6F4'; // topo navegação dos meses cabecalho calendario <tr>
$calfontback = '+1'; // link previous month
$calfontasked = '+3'; // link asked month
$calfontnext = '+1'; // link next month
# Domingo
$sundaytopclr = '#AEC6F4'; // Cor de fundo para o domingo <tr>-top
$sundayclr = '#AEC6F4'; // cor para os dias que são domingos no mês
$sundayemptyclr = '#AEC6F4'; // cor dos dias que são domingos no mês, mas não tem dias
#Outros dias da semana
$weekdaytopclr = '#B4B9D4'; // cor para os demais itens da semana
$weekdayemptyclr = '#B4B9D4'; // Cor para dias da semana que não tem dia no mês <td>
$todayclr = '#0075C4'; // Cor do dia atual

$weekdayclr = '#B4B9D4'; // Cor de todos os dias menos para o domingo
?>

# WP Challenge > Landing page (half a day / full day)

(times are given for the champs)

## Alpha 1: Client wants a landing page saying when the product will be launched
    13h30 (45m) 9h30
    New WP install
    New theme (no parent, starter: underscores)
    Page with new Template => homepage
    NB: Préciser qu'il faut le faire le plus vite possible (sinon ils le font direct dans WP)

## Alpha 2: Product launch date changed
    14h15 (10m) 10h
    Client wants to be able to change the introduction text and the date
    Watch out for use of the_meta() => go get *only* the key needed instead => get_post_meta()


-- PAUSE --
    WPDB https://codex.wordpress.org/Class_Reference/wpdb
    > insert, prepare

## Beta 1: Client wants to save visitors names and emails
    14h25 (35m) 10h15
    Add a form with email, name
    NB: Check that they show a confirmation message when the email is saved
    Requirements: https://codex.wordpress.org/Class_Reference/wpdb
    Warning: Using 'name' as a variable in the form bugs WP

## Beta 2: Client wants more options
    15h00 (1h) 11h05
    Save choice of HTML/Text newsletter preference


## RC 1: Client wants to be able to change the thank you text and image
    16h (30m) 11h15
    Means: activating featured image (functions.php) [not anymore]
    permissions issues uploading: chgroup chmod (use chmod g+w instead of 775)

    Done: 11h40
    Group who finished first goes around and helps others moving on

-- PAUSE --
    Admin Menu: https://developer.wordpress.org/plugins/administration-menus/

## RC 2: Client want to see all details that have been saved
    16h30 - 17h Done. (30m)
    Means: adding a new menu entry in the backend
    Requirements: Add admin menu

## Optional:
    - Add a countdown to the launch date
    - Add a counter of people pre-registered
    - Prepare message when launch date passed
    - Client wants to receive an email when someones leaves his details

## Question
    Where could such a site (WP) be hosted? Free options?
    What solutions could be used to send the newsletter?


## Outcome
    Two ways:
        - deliver quickly maybe spend more time later
        - spend more time, client waits more (at first, maybe less later, but it's a bet)


## Bones

Add contact page (without plugin)
    => Check for SPAM / robots
How does it print?
Export to PDF?

Pluging to save emails (subscribe)
Page Subscribe
    Formulaire pour envoyer son email
    Compteur nombre de personnes inscrites


Plugin New product launch

    Admin   => Enter a date
            (+) Text fields (before / after)
    Page    => Shows days until date
            => If date expired show message


    places left = xxx
    nombre jours left

Code review
    How to improve code
    What functions were used, how



## CSS

To generate the style.css run: `sass --watch scss:.`


## Recap

Install Wordpress
Create a new theme from starter
Create a new template, for a page, set it as the homepage
Remove the top toolbar
Custom fields > get_post_meta
get_the_post_thumbnail
global $wpdb (insert, query, prepqre)
Add a new table, store and retreive data
functions.php > add_action add_menu_page
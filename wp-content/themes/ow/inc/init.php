<?php
/* ========================================================================== */
/* Abbreviations */
/* ============= */

/*
	accn: accordion
	ans : animation
	attr: attribute
	brdr: border
	cat:  category
	cats: categories
	cfg:  configuration
	clt:  callout
	ctct: contact
	ctls: callouts
	cpnt: component
	ctnr: container
	ctnt: content
	dbl:  double
	dyc:  dynamic
	fmt:  format
	img:  image
	lyts: layouts
	mrkp: markup
	opts: options
	prop: property
	sctn: section
	set:  settings
	sgl:  single
	spcg: spacing
	stc:  static
	trig: trigger
	vid:  video
	wgts: widgets
	wrap: wrapper
*/


/* ========================================================================== */
/* Base */
/* ==== */

/* Sets up theme defaults and registers support for various WordPress features. */
require 'base/setup.php';

/* Set the content width in pixels, based on the theme's design and stylesheet. */
require 'base/content-width.php';

/* Register widget area. */
require 'base/widgets.php';

/* Enqueue scripts and styles. */
require 'base/scripts.php';

/* Remove default top margin from html tag */
require 'base/remove-top-margin.php';

/* Add active class to current navigation link */
require 'base/active-nav-link.php';



/* ========================================================================== */
/* Helpers */
/* ======= */

require 'helpers/custom-post-type.php';
require 'helpers/general.php';
require 'helpers/page.php';
require 'helpers/post.php';



/* ========================================================================== */
/* Everything else */
/* =============== */

/* I tried using init for Helpers and Base, but throws an error */

require 'underscores/init.php';
require 'plugins/init.php';
require 'layouts/init.php';
require 'components/init.php';
require 'acf/init.php';
require 'sections/init.php';
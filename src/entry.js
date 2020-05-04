// sass
import "./sass/style.scss"
// js
import "bootstrap"
// import jQuery from "jquery"
window.$ = window.jQuery = jQuery;

// fontawesome
import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { faClock } from '@fortawesome/free-regular-svg-icons'
import { faEdit, faRss, faSearch, faList, faTags, faComment, faHistory, faHashtag } from '@fortawesome/free-solid-svg-icons'
import { faTwitter } from '@fortawesome/free-brands-svg-icons'
library.add(
	faClock,
	faEdit, faRss, faSearch, faList, faTags, faComment, faHistory, faHashtag,
	faTwitter
)
dom.watch()

// $ init
$('[data-toggle="popover"]').popover();
$('[data-toggle="tooltip"]').tooltip();

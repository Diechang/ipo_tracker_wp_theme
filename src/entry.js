// sass
import "./sass/style.scss"
// js
import "bootstrap"
// fontawesome
import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { faRss } from '@fortawesome/free-solid-svg-icons'
import { faTwitter } from '@fortawesome/free-brands-svg-icons'
library.add(faRss, faTwitter)
dom.watch()

// $ init
$('[data-toggle="popover"]').popover();
$('[data-toggle="tooltip"]').tooltip();

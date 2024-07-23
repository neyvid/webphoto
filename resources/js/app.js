import './bootstrap';


// Import custom JavaScript functions from resources/js/utilities.js
import { changeUserStatus } from './adminFunctions';
window.changeUserStatus = changeUserStatus;

import Dropzone from 'dropzone';
window.Dropzone=Dropzone;
import Swal from 'sweetalert2';
window.Swal = Swal;
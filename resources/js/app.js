import './bootstrap';



// Import custom JavaScript functions from resources/js/utilities.js
import { changeUserStatus } from './adminFunctions';
window.changeUserStatus = changeUserStatus;

import Dropzone from 'dropzone';
window.Dropzone=Dropzone;

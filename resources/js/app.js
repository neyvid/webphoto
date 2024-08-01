import './bootstrap';


// Import custom JavaScript functions from resources/js/utilities.js
// import { changeUserStatus } from './adminFunctions';
// window.changeUserStatus = changeUserStatus;
import {
    changeStatus
} from './adminFunctions';

window.changeStatus = changeStatus;

import Dropzone from 'dropzone';
window.Dropzone = Dropzone;

import Swal from 'sweetalert2';
window.Swal = Swal;

import DataTable from 'datatables.net-dt';
window.DataTable = DataTable;


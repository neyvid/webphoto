import './bootstrap';



// Import custom JavaScript functions from resources/js/utilities.js
import { changeUserStatus } from './adminFunctions';
window.changeUserStatus = changeUserStatus;

import Dropzone from 'dropzone';
const allowMaxFilesize = 5;
const allowMaxFiles = 5;
const myDropzone = new Dropzone("#my-awesome-dropzone", {
    url: "{{ route('upload-media') }}",
    method: "POST",
    paramName: "files",
    autoProcessQueue: false,
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    maxFiles: allowMaxFiles,
    maxFilesize: allowMaxFilesize, // MB
    uploadMultiple: true,
    parallelUploads: 100, // use it with uploadMultiple
    createImageThumbnails: true,
    thumbnailWidth: 120,
    thumbnailHeight: 120,
    addRemoveLinks: true,
    timeout: 180000,
    dictRemoveFileConfirmation: "Are you Sure?", // ask before removing file
    // Language Strings
    dictFileTooBig: `File is to big. Max allowed file size is ${allowMaxFilesize}mb`,
    dictInvalidFileType: "Invalid File Type",
    dictCancelUpload: "Cancel",
    dictRemoveFile: "Remove",
    dictMaxFilesExceeded: `Only ${allowMaxFiles} files are allowed`,
    dictDefaultMessage: "Drop files here to upload",
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
}

);


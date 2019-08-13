import { Component, OnInit } from '@angular/core';
import {  FileUploader, FileSelectDirective } from 'ng2-file-upload/ng2-file-upload';
import { HttpClient, HttpEventType, HttpResponse } from '@angular/common/http';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-upload-photo',
  templateUrl: './upload-photo.component.html',
  styleUrls: ['./upload-photo.component.scss']
})
export class UploadPhotoComponent implements OnInit {

  URL = 'http://localhost:3000/api/upload';
  percentDone: number;
  uploadSuccess: boolean;
  isFileChosen = false;
  files: File[];
  url:any;
  public uploader: FileUploader = new FileUploader({url: this.URL, itemAlias: 'photo'});
  profile_img:any;
  showError:any;

  constructor(private http: HttpClient) { }

  ngOnInit() {
    this.uploader.onAfterAddingFile = (file) => {
      file.withCredentials = false; 
      console.log(file);
   };
   this.uploader.onCompleteItem = (item: any, response: any, status: any, headers: any) => {
        console.log('ImageUpload:uploaded:', item, status, response);
        alert('File uploaded successfully');
    };
  }

  upload(event){
    //pick from one of the 4 styles of file uploads below
    //this.uploadAndProgress(files);

    this.isFileChosen = true;
    this.files = event.target.files;
    var reader = new FileReader();

    reader.readAsDataURL(this.files[0]); // read file as data url

    reader.onload = (evt:any) => { // called once readAsDataURL is completed
      this.url = evt.target.result;
    }

  }

  basicUpload(files: File[]){
    var formData = new FormData();
    Array.from(files).forEach(f => formData.append('file', f))
    this.http.post('https://file.io', formData)
      .subscribe(event => {  
        console.log('done')
      })
  }
  
  //this will fail since file.io dosen't accept this type of upload
  //but it is still possible to upload a file with this style
  basicUploadSingle(file: File){    
    this.http.post('https://file.io', file)
      .subscribe(event => {  
        console.log('done')
      })
  }
  
  uploadAndProgress(files: File[]){
    console.log(files)
    var formData = new FormData();
    Array.from(files).forEach(f => formData.append('file',f))
    
    this.http.post('https://file.io', formData, {reportProgress: true, observe: 'events'})
      .subscribe(event => {
        if (event.type === HttpEventType.UploadProgress) {
          this.percentDone = Math.round(100 * event.loaded / event.total);
        } else if (event instanceof HttpResponse) {
          this.uploadSuccess = true;
        }
    });
  }
  
  //this will fail since file.io dosen't accept this type of upload
  //but it is still possible to upload a file with this style
  uploadAndProgressSingle(file: File){    
    this.http.post('https://file.io', file, {reportProgress: true, observe: 'events'})
      .subscribe(event => {
        if (event.type === HttpEventType.UploadProgress) {
          this.percentDone = Math.round(100 * event.loaded / event.total);
        } else if (event instanceof HttpResponse) {
          this.uploadSuccess = true;
        }
    });
  }

  uploadFile(f:NgForm) {
    console.log(f.value);
  }

}

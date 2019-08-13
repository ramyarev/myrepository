import { Component, OnInit } from '@angular/core';
import {  FileUploader, FileSelectDirective } from 'ng2-file-upload/ng2-file-upload';
import { HttpClient, HttpEventType, HttpResponse } from '@angular/common/http';
import { FormsModule,ReactiveFormsModule, NgForm  }   from '@angular/forms';

@Component({
  selector: 'app-share-identity',
  templateUrl: './share-identity.component.html',
  styleUrls: ['./share-identity.component.scss']
})
export class ShareIdentityComponent implements OnInit {

  URL = 'http://localhost:3000/api/upload';
  percentDone: number;
  uploadSuccess: boolean;
  isFileChosen = false;
  files: File[];
  public uploader: FileUploader = new FileUploader({url: this.URL, itemAlias: 'photo'});
  afuConfig = {
    uploadAPI: {
      url:"https://example-file-upload-api"
    }
  };
  docType: any = { 
    aadhar: 'aadhar', 
    pancard: true, 
    passport: false, 
    licence: false 
  };
  aadharText="";
  signupEmailText="";
  showError="";

  constructor(private http: HttpClient) { }

  ngOnInit() {
    this.uploader.onAfterAddingFile = (file) => {
       file.withCredentials = false; 
       console.log('fle added');
    };
    this.uploader.onCompleteItem = (item: any, response: any, status: any, headers: any) => {
         console.log('ImageUpload:uploaded:', item, status, response);
         alert('File uploaded successfully');
     };
  }

  upload(files: File[]){
    //pick from one of the 4 styles of file uploads below
    //this.uploadAndProgress(files);
    this.isFileChosen = true;
    this.files = files;
    console.log(this.files[0].name);
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

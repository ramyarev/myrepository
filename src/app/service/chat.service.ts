import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ChatService {

  chats = [];

  constructor() {
    this.chats = [
      {
        name:"Surendar",
        image:"Surendar",
        messages:[
          {
            user_id:"1",
            message:"hi hello.. how r u?",
            date_time:"2 days ago"

          },
          {
            user_id:"1",
            message:"hi hello.. how r u?",
            date_time:"2 days ago"

          },
          {
            user_id:"1",
            message:"hi hello.. how r u?",
            date_time:"2 days ago"

          },
          {
            user_id:"1",
            message:"hi hello.. how r u?",
            date_time:"2 days ago"

          },
          {
            user_id:"2",
            message:"hi hello.. how r u?",
            date_time:"2 days ago"

          },
          {
            user_id:"2",
            message:"hi hello.. how r u?",
            date_time:"2 days ago"

          },
          {
            user_id:"1",
            message:"hi hello.. how r u?",
            date_time:"2 days ago"

          }
        ]
      },
      {
        name:"Surendar",
        image:"Surendar",
        messages:[
          {
            user_id:"2",
            message:"hi hello.. how r u?",
            date_time:"2 days ago"

          },
          {
            user_id:"2",
            message:"hi hello.. how r u?",
            date_time:"2 days ago"

          },
          {
            user_id:"1",
            message:"hi hello.. how r u?",
            date_time:"2 days ago"

          }
        ]
      }
    ];
   }
}

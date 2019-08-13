import { Component, OnInit } from '@angular/core';
import { NotificationService } from 'src/app/service/notification.service';

@Component({
  selector: 'app-notification',
  templateUrl: './notification.component.html',
  styleUrls: ['./notification.component.scss']
})
export class NotificationComponent implements OnInit {

  chats = [];
  selectedChat:any;
  constructor(private chatService:NotificationService) {
    this.chats = this.chatService.chats;
  }

  ngOnInit() {
  }

  onChatSelected(chat) {
    this.selectedChat  = chat;
  }

}

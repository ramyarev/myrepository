import { Component, OnInit } from '@angular/core';
import { ChatService } from 'src/app/service/chat.service';

@Component({
  selector: 'app-conversation',
  templateUrl: './conversation.component.html',
  styleUrls: ['./conversation.component.scss']
})
export class ConversationComponent implements OnInit {

  chats = [];
  selectedChat:any;
  constructor(private chatService:ChatService) {
    this.chats = this.chatService.chats;
  }

  ngOnInit() {
  }

  onChatSelected(chat) {
    this.selectedChat  = chat;
  }
}

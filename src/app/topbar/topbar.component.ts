import {Component, OnInit} from '@angular/core';
import { Router } from '@angular/router';
import {MenuItem} from 'primeng/api';

@Component({
  selector: 'app-topbar',
  templateUrl: './topbar.component.html',
  styleUrls: ['./topbar.component.scss']
})
export class TopbarComponent implements OnInit {
  display = false;
  items: MenuItem[] = [];

  constructor(
    private router: Router
  ) {
    this.items = [
     
    ];
  }
goToLogin(){
 this.router.navigate(['/login']);
}
    ngOnInit()
  :
    void {}

  }

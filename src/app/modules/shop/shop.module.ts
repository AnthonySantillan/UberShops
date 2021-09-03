import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ShopRoutingModule } from './shop-routing.module';
import { ShopComponent } from './shop-list/shop.component';

import { CardModule } from 'primeng/card';
import { ButtonModule } from 'primeng/button';
import { PasswordModule } from 'primeng/password';
import { InputTextModule } from 'primeng/inputtext';
import { RatingModule } from 'primeng/rating';
import { TableModule } from 'primeng/table';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { ShopClientComponent } from './shop-client/shop-client.component';
import { PanelModule } from 'primeng/panel';



@NgModule({
  declarations: [
    ShopComponent,
    ShopClientComponent
  ],
  imports: [
    CommonModule,
    ShopRoutingModule,
    TableModule,
    CardModule,
    ButtonModule,
    PasswordModule,
    InputTextModule,
    RatingModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    PanelModule
  ]
})
export class ShopModule { }

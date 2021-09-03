import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ProductRoutingModule } from './product-routing.module';
import { ProductListComponent } from './product-list/product-list.component';
import { ProductClientComponent } from './product-client/product-client.component';
import {DataViewModule} from 'primeng/dataview';
import { CardModule } from 'primeng/card';
import { PanelModule } from 'primeng/panel';

@NgModule({
  declarations: [
    ProductListComponent,
    ProductClientComponent
  ],
  imports: [
    CommonModule,
    ProductRoutingModule,
    DataViewModule,
    CardModule,
    PanelModule,
    
  ]
})
export class ProductModule { }

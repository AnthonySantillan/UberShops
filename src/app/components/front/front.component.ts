import { Component, Directive, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ShopModel } from 'src/app/models';
import { MessageService } from 'src/app/services/messages/message.service';
import { ShopHttpService } from 'src/app/services/shop/shop-http.service';


@Component({
  selector: 'app-front',
  templateUrl: './front.component.html',
  styleUrls: ['./front.component.css'],
})
export class FrontComponent implements OnInit {
  //variables para usarse
  shop: ShopModel = {};
  Shops: ShopModel[] = [];
  numbers: number[] = [];

  categories: string[] = ['viveres', 'repuestos de autos', 'tecnologia', 'limpiesa y aseo', 'juguetes', 'utiles escolares', 'telas'];
  imageDirections: string[] = ['../../assets/media/images/viveres.jpg', '../../assets/media/images/repuestos.jpg', '../../assets/media/images/tecnologia.jpg',
    '../../assets/media/images/limpieza.jpg', '../../assets/media/images/juguetes.jpg', '../../assets/media/images/escolares.jpg', '../../assets/media/images/telas.jpg'];
  constructor(private shopHttpService: ShopHttpService,
    private messageService: MessageService,
    private router: Router) {
      this.getShops();
    
  }
  // obtiene un registro de la base de datos
  getShop(shop: ShopModel) {
    this.shopHttpService.getOne(shop.id).subscribe(
      response => {
        console.log(response.data);
        for (let index = 0; index < this.Shops.length; index++) {
                    this.numbers.push(this.randomNumber(0,6));
        }
        this.shop = response.data;
      }, error => {
        this.messageService.error(error);
      }
    );
  }
  //obtiene todos los registro de la base de datos
  getShops() {
    this.shopHttpService.getAll().subscribe(
      response => {

        this.getShop(response.data[0]);
        this.Shops = response.data;
      }, error => {
        this.messageService.error(error);
      }
    );
  }
  public randomNumber(min: number, max: number): number {
    return Math.round(Math.random() * (max - min) + min);
  }
  //metodo para dirigir a otro tienda especifica
  goTo(shop:ShopModel) {
    console.log(shop);
    // this.router.navigate(['']);
  }
  ngOnInit(): void {}


}

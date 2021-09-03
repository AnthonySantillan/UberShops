import { Component, Input, OnInit, Output } from '@angular/core';
import { Router } from '@angular/router';
import { ProductModel, ShopModel } from 'src/app/models';
import { MessageService } from 'src/app/services/messages/message.service';
import { ProductHttpService } from 'src/app/services/product/product-http.service';

@Component({
  selector: 'app-product-client',
  templateUrl: './product-client.component.html',
  styleUrls: ['./product-client.component.css']
})
export class ProductClientComponent implements OnInit {
  //variables para usarse
  product: ProductModel = {};
  Products: ProductModel[] = [];
  numbers: number[] = [];
  shop: ShopModel = {};
  cat:string="";
  categories: string[] = ['viveres', 'repuestos de autos', 'tecnologia', 'limpiesa y aseo', 'juguetes', 'utiles escolares', 'telas'];
  imageDirections: string[] =
    [
      '../../assets/media/images/avena.png',
      '../../assets/media/images/arroz.jpg',
      '../../assets/media/images/azucar.jpg',
      '../../assets/media/images/sardina.jpg',
      '../../assets/media/images/cafe.jpg',
      '../../assets/media/images/dulces.jpg',
      '../../assets/media/images/enlatados.jpg',
      '../../assets/media/images/leche.jpg',
      '../../assets/media/images/papel.jpg',
      '../../assets/media/images/queso.jpg',
    ];
  constructor(private productHttpService: ProductHttpService,
    private messageService: MessageService,
    private router: Router) {
    if (this.router.getCurrentNavigation()?.extras.state) {
      let shop = this.router.getCurrentNavigation()?.extras.state;
      this.shop = shop?.shop;
      this.cat=shop?.cat;
    }
    console.log(this.shop);
    this.getProducts();

  }
  // obtiene un registro de la base de datos
  getProduct(product: ProductModel) {
    this.productHttpService.getOne(product.id).subscribe(
      response => {
        console.log(response.data);
        for (let index = 0; index < this.Products.length; index++) {
          this.numbers.push(this.randomNumber(0, 9));
        }
        this.product = response.data;
      }, error => {
        this.messageService.error(error);
      }
    );
  }
  //obtiene todos los registro de la base de datos
  getProducts() {
    this.productHttpService.getAll().subscribe(
      response => {

        this.getProduct(response.data[0]);
        this.Products = response.data;
      }, error => {
        this.messageService.error(error);
      }
    );
  }
  public randomNumber(min: number, max: number): number {
    return Math.round(Math.random() * (max - min) + min);
  }
  //metodo para dirigir a otro tienda especifica
  goTo(product: ProductModel) {
    console.log(product);
    // this.router.navigate(['']);
  }
  ngOnInit(): void {

  }

}

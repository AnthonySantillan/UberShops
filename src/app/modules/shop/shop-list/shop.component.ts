import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { MessageService } from 'src/app/services/messages/message.service';
import { ShopHttpService } from 'src/app/services/shop/shop-http.service';
import { ShopModel } from 'src/app/models';

@Component({
  selector: 'app-shop',
  templateUrl: './shop.component.html',
  styleUrls: ['./shop.component.css']
})
export class ShopComponent implements OnInit {
  // vatrables que guardan los datos recuperados de la BD e instacian el formulario
  shop: ShopModel = {};
  Shops: ShopModel[]= [];
  ShopForm: FormGroup;
  selectedShops: ShopModel[] = [];
  // se cargan las dependencias y se inicializa el formulario
  constructor(private formBuilder: FormBuilder,
     private shopHttpService: ShopHttpService,
    private messageService: MessageService) {

    this.ShopForm = this.newFormShop();
  }
  // da forma al formulario que manejara los datos
  newFormShop():FormGroup {
    return this.formBuilder.group({
      id: [null],
      seller_id: [1],
      product_id: [1],
      name: [null, [Validators.required, Validators.maxLength(50)]],
      code: [null, [Validators.required, Validators.minLength(2), Validators.maxLength(10)]],
      direction: ['soil'],
    });
  }

  ngOnInit(): void {
    this.getShops();
    // this.getShop();
  }
  // obtiene un registro de la base de datos
  getShop(shop:ShopModel) {
    this.shopHttpService.getOne(shop.id).subscribe(
      response => {
        console.log(response.data);
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
        console.log(response.data);
        this.getShop(response.data[0]);
        this.Shops = response.data;
      }, error => {
        this.messageService.error(error);
      }
    );
  }

  // crea un nuevo registro en la base de datos
  storeShop(shop: ShopModel): void {
    this.shopHttpService.Store(shop).subscribe(
      response => {
       this.saveShop(response.data);
        this.messageService.success(response);
      },
      error => {
        this.messageService.error(error)
      }
    );
  }
 //actualizar un registro de la base de datos
 updateShop(shop: ShopModel): void {
  this.shopHttpService.Update(shop.id,shop).subscribe(
    response => {
      this.saveShop(response.data);
      this.messageService.success(response);
    },
    error => {
      this.messageService.error(error)
    }
  );
}
  //elimina un registro de la base de datos
  deleteShop(shop: ShopModel) {
    this.shopHttpService.destroy(shop.id).subscribe(
      response => {
        console.log(response);
        this.removeShop(shop);
        this.messageService.success(response);
      },
      error => {
        this.messageService.error(error)
      }
    );
  }
  //elimina varios registro de la base de datos
  // TODO: ELIMINAR VARIOS REGISTROS
  deleteShops( ) {
    console.log(this.selectedShops);
    const ids = this.selectedShops.map(element => element.id);
          this.shopHttpService.destroys(ids).subscribe(
            response => {
              this.removeShops(ids);
              this.messageService.success(response);
            },
            error => {
              this.messageService.error(error);
            }
          );
  }
// carga la informacion del registro en el formulario
  selectShop(shop: ShopModel) {
    this.ShopForm.patchValue(shop);
  }
  //elimina visualmente un registro de la pantalla
  removeShop(shop: ShopModel) {
    this.Shops = this.Shops.filter(element => element.id !== shop.id);
  }
  //elimina visualmente varios registros de la pantalla
  removeShops(ids: (number | undefined)[]) {
    for (const id of ids) {
      this.Shops = this.Shops.filter(element => element.id !== id);
    }
  }
  //se usa para actualizar o para agregar un registro a la pantalla
  saveShop(shop: ShopModel) {
    const index = this.Shops.findIndex(element => element.id === shop.id);
    if (index === -1) {
      this.Shops.push(shop);
    } else {
      this.Shops[index] = shop;
    }
  }
  //metodo para guardar o actualizar
  onSubmit(shop: ShopModel) {
    if (this.ShopForm.valid) {
      if (shop.id) {
        this.updateShop(shop);
      } else {
        this.storeShop(shop);
      }
      this.ShopForm.reset();
    }else{
      this.ShopForm.markAllAsTouched();
    }
  }
  //getters
  get idField() {
    return this.ShopForm.controls['id'];
  }
  get nameField() {
    return this.ShopForm.controls['name'];
  }
  get codeField() {
    return this.ShopForm.controls['code'];
  }
  get directionField() {
    return this.ShopForm.controls['direction'];
  }


}

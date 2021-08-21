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
  shop: ShopModel = {};
  shops: ShopModel[] = [];
  constructor(private formBuilder: FormBuilder,
     private shopHttpService: ShopHttpService,
    private messageService: MessageService) {
    this.ShopForm = this.newFormShop();
  }
  ShopForm: FormGroup;
  newFormShop():FormGroup {
    return this.formBuilder.group({
      id: [null],
      name: [null, [Validators.required, Validators.maxLength(50)]],
      code: [null, [Validators.required, Validators.minLength(2), Validators.maxLength(15)]],
    });
  }

  ngOnInit(): void {
    this.getShop();
    this.getShops();
  }
  getShop(shop?:ShopModel|undefined) {
    this.shopHttpService.getOne(2).subscribe(
      response => {
        this.shop = response.data;
      }, error => {
        this.messageService.error(error);
      }
    );
  }

  getShops() {
    this.shopHttpService.getAll().subscribe(
      response => {
        this.shops = response.data;
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
        this.deleteShop(shop);
        this.messageService.success(response);
      },
      error => {
        this.messageService.error(error)
      }
    );
  }
  //elimina varios registro de la base de datos
  // TODO: ELIMINAR VARIOS REGISTROS
  deleteShops() {
    
  }
// carga la informacion del registro en el formulario
  selectShop(shop: ShopModel) {
    this.ShopForm.patchValue(shop);
  }

  //elimina visualmente un registro de la pantalla
  removeShop(shop: ShopModel) {
    this.shops = this.shops.filter(element => element.id !== shop.id);
  }
  //se usa para actualizar o para agregar un registro a la pantalla
  saveShop(shop: ShopModel) {
    const index = this.shops.findIndex(element => element.id === shop.id);
    if (index === -1) {
      this.shops.push(shop);
    } else {
      this.shops[index] = shop;
    }
  }
  //se llama al dar clic en en
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
  get idField() {
    return this.ShopForm.controls['id'];
  }
  get nameField() {
    return this.ShopForm.controls['name'];
  }
  get codeField() {
    return this.ShopForm.controls['code'];
  }


}

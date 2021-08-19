import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { RoleModel } from 'src/app/models/role.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class RoleHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<RoleModel>{
    const url:string=`${this.API_URL}/roles`;
    return this.httpClient.get(url);
  }
  getOne(id:number) {
    const url:string=`${this.API_URL}/roles/${id}`;
    return this.httpClient.get(url);
   }
  Update(id:number,shop:RoleModel) { 
    const url:string=`${this.API_URL}/roles/${id}`;
    return this.httpClient.put(url,shop);
  }
  Store(shop:RoleModel) { 
    const url:string=`${this.API_URL}/roles`;
    return this.httpClient.post(url,shop);
  }
  destroy(id:number) { 
    const url:string=`${this.API_URL}/roles/${id}`;
    return this.httpClient.delete(url);
  }
  destroys() {
    const url:string=`${this.API_URL}/roles`;
    return this.httpClient.get(url);
   }
}

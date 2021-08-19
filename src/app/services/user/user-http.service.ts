import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { UserModel } from 'src/app/models/user.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class UserHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<UserModel>{
    const url:string=`${this.API_URL}/users`;
    return this.httpClient.get(url);
  }
  getOne(id:number) {
    const url:string=`${this.API_URL}/users/${id}`;
    return this.httpClient.get(url);
   }
  Update(id:number,shop:UserModel) { 
    const url:string=`${this.API_URL}/users/${id}`;
    return this.httpClient.put(url,shop);
  }
  Store(shop:UserModel) { 
    const url:string=`${this.API_URL}/users`;
    return this.httpClient.post(url,shop);
  }
  destroy(id:number) { 
    const url:string=`${this.API_URL}/users/${id}`;
    return this.httpClient.delete(url);
  }
  destroys() {
    const url:string=`${this.API_URL}/users`;
    return this.httpClient.get(url);
   }
}

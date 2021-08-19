import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { DriverModel } from 'src/app/models/driver.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class DriverHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<DriverModel>{
    const url:string=`${this.API_URL}/drivers`;
    return this.httpClient.get(url);
  }
  getOne(id:number) {
    const url:string=`${this.API_URL}/drivers/${id}`;
    return this.httpClient.get(url);
   }
  Update(id:number,shop:DriverModel) { 
    const url:string=`${this.API_URL}/drivers/${id}`;
    return this.httpClient.put(url,shop);
  }
  Store(shop:DriverModel) { 
    const url:string=`${this.API_URL}/drivers`;
    return this.httpClient.post(url,shop);
  }
  destroy(id:number) { 
    const url:string=`${this.API_URL}/drivers/${id}`;
    return this.httpClient.delete(url);
  }
  destroys() {
    const url:string=`${this.API_URL}/drivers`;
    return this.httpClient.get(url);
   }
}

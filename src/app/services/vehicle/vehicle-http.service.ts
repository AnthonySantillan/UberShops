import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { VehicleModel } from 'src/app/models/vehicle.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class VehicleHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<VehicleModel>{
    const url:string=`${this.API_URL}/vehicles`;
    return this.httpClient.get(url);
  }
  getOne(id:number) {
    const url:string=`${this.API_URL}/vehicles/${id}`;
    return this.httpClient.get(url);
   }
  Update(id:number,shop:VehicleModel) { 
    const url:string=`${this.API_URL}/vehicles/${id}`;
    return this.httpClient.put(url,shop);
  }
  Store(shop:VehicleModel) { 
    const url:string=`${this.API_URL}/vehicles`;
    return this.httpClient.post(url,shop);
  }
  destroy(id:number) { 
    const url:string=`${this.API_URL}/vehicles/${id}`;
    return this.httpClient.delete(url);
  }
  destroys() {
    const url:string=`${this.API_URL}/vehicles`;
    return this.httpClient.get(url);
   }
}
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { Handler } from 'src/app/exceptions/handler';
import { ServerResponse } from 'src/app/models/server-response';
import { VehicleModel } from 'src/app/models/vehicle.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class VehicleHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<ServerResponse>{
    const url:string=`${this.API_URL}/vehicles`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  getOne(id:number):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/vehicles/${id}`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
  Update(id:number,vehicle:VehicleModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/vehicles/${id}`;
    return this.httpClient.put<ServerResponse>(url,vehicle)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  Store(vehicle:VehicleModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/vehicles`;
    return this.httpClient.post<ServerResponse>(url,vehicle)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroy(id:number):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/vehicles/${id}`;
    return this.httpClient.delete<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroys(vehicles:VehicleModel[]):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/vehicles`;
    return this.httpClient.patch<ServerResponse>(url,vehicles)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
}

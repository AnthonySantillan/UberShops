import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { Handler } from 'src/app/exceptions/handler';
import { DriverModel } from 'src/app/models/driver.model';
import { ServerResponse } from 'src/app/models/server-response';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class DriverHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<ServerResponse>{
    const url:string=`${this.API_URL}/drivers`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  getOne(id:number):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/drivers/${id}`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
  Update(id:number,driver:DriverModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/drivers/${id}`;
    return this.httpClient.put<ServerResponse>(url,driver)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  Store(driver:DriverModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/drivers`;
    return this.httpClient.post<ServerResponse>(url,driver)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroy(id:number):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/drivers/${id}`;
    return this.httpClient.delete<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroys(drivers:DriverModel[]):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/drivers`;
    return this.httpClient.patch<ServerResponse>(url,drivers)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
}

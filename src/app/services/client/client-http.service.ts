import { Injectable } from '@angular/core';
import { ServerResponse } from 'src/app/models/server-response';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import { HttpClient } from '@angular/common/http'
import { ClientModel } from 'src/app/models/client.model';
import { Handler } from 'src/app/exceptions/handler';
import { catchError, map } from 'rxjs/operators';
@Injectable({
  providedIn: 'root'
})
export class ClientHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<ServerResponse>{
    const url:string=`${this.API_URL}/clients`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  getOne(id:number):Observable<ServerResponse>{
    const url:string=`${this.API_URL}/clients/${id}`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
  Update(id:number,client:ClientModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/clients/${id}`;
    return this.httpClient.put<ServerResponse>(url,client)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  Store(client:ClientModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/clients`;
    return this.httpClient.post<ServerResponse>(url,client)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroy(id:number):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/clients/${id}`;
    return this.httpClient.delete<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroys(clients:ClientModel[]):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/clients`;
    return this.httpClient.patch<ServerResponse>(url,clients)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
}

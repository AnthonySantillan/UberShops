import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ServerResponse } from 'src/app/models/server-response'; 
import { Observable } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { Handler } from 'src/app/exceptions/handler';
import { RoleModel } from 'src/app/models/role.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class RoleHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<ServerResponse>{
    const url:string=`${this.API_URL}/roles`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  getOne(id:number):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/roles/${id}`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
  Update(id:number,role:RoleModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/roles/${id}`;
    return this.httpClient.put<ServerResponse>(url,role)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  Store(role:RoleModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/roles`;
    return this.httpClient.post<ServerResponse>(url,role)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroy(id:number):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/roles/${id}`;
    return this.httpClient.delete<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroys(roles:RoleModel[]):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/roles`;
    return this.httpClient.patch<ServerResponse>(url,roles)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
}

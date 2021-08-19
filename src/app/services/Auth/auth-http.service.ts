import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PlayerModel } from '../../models/player.model';
import {catchError, map} from 'rxjs/operators';
import {ServerResponse} from '../../models/server-response';
import {Handler} from '../../exceptions/handler';
import {environment} from '../../../environments/environment';
import {MessageService} from '../messages/message.service';
import { LoginModel } from 'src/app/models';

@Injectable({
  providedIn: 'root'
})
export class AuthHttpService {
  API_URL: string = environment.API_URL;
  
  constructor(private httpClient:HttpClient) { }
  login(credentials:LoginModel): Observable<ServerResponse>{
    const url=`${this.API_URL}/auth/login`;
    return this.httpClient.post<ServerResponse>(url,credentials)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
 
}
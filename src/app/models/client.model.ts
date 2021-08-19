import { RoleModel } from "./role.model";
import { UserModel } from "./user.model";
export interface ClientModel{
    id?:number;
    user?:UserModel;
    role?:RoleModel;
    card?:string;
}
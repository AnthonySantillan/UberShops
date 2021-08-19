import { RoleModel } from "./role.model";
import { UserModel } from "./user.model";

export interface SellerModel{
    id?:number;
    ruc?:number;
    user?:UserModel;
    role?:RoleModel;
}
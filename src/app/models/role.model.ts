import { PermissionModel } from "./permission.model";

export interface RoleModel{
    id?:number;
    name?:number;
    permissions?: PermissionModel[];
}
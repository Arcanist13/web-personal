import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router, RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable } from 'rxjs';
import { AuthService } from '../services/auth.service';

@Injectable({
  providedIn: 'root'
})
export class UserAdminGuard implements CanActivate {
  constructor(
    private _authService: AuthService,
    private _router: Router
  ) {}

  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree
  {
    return new Promise<boolean>((resolve, _) => {
      this._authService.login().then(() => {
        if (this._authService.getCurrentUserInfo().admin === 1) {
          resolve(true);
        } else {
          this._router.navigate(['/user/login']);
          resolve(false);
        }
      })
      .catch(() => {
        this._router.navigate(['/user/login']);
        resolve(false);
      });
    });
  }

}

import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Subject } from 'rxjs';
import { IRegisterUser, IUser } from 'src/app/shared/models/user.model';
import { AuthService } from 'src/app/static/services/auth.service';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  private _loggedIn: boolean;
  private _loginUpdate: Subject<boolean>;
  private _userInfo: IUser | undefined;

  constructor(
    private _authService: AuthService,
    private _http: HttpClient,
    private _router: Router,
  ) {
    this._loggedIn = false;
    this._loginUpdate = new Subject<boolean>();
    this._userInfo = undefined;

    // On init check if already logged in and have a valid token
    this.login();
  }

  /**
   * Login a user with a username and password
   *
   * @param username  users username
   * @param password  users password
   * @returns         promise result
   */
  login(username?: string, password?: string): Promise<void> {
    return this._authService.login(username, password).then((user: {info: IUser}) => {
      this.updateUser(user.info);
    }).catch((error) => {
      this.logout();
      throw error;
    });
  }

  /**
   * Logout the current user
   *
   * @returns promise result
   */
  logout(): Promise<void> {
    return this._authService.logout().then(() => {
      this.updateUser();
    });
  }

  /**
   * Register a new user account and login.
   *
   * @param username  new account username (must be unique)
   * @param email     new user email, optional
   * @param password  new user password
   * @returns         register result
   */
  register(username: string, email: string, password: string): Promise<void> {
    return this._http.post<IRegisterUser>(
      environment.backendUri + '/register',
      {
        username, email, password
      } as IRegisterUser
    ).toPromise().then(() => {
      this.login(username, password);
    });
  }

  /**
   * Update the user information of reset it if there isn't any.
   *
   * @param user  user information
   */
  private updateUser(user?: IUser): void {
    this._userInfo = user;
    this._loggedIn = !!this._userInfo;
    this._loginUpdate.next(!!this._userInfo);
  }

  /**
   * Check if the user is logged in, redirect if they aren't
   *
   * @param state log in state
   */
  checkLoggedIn(state: boolean): void {
    if (!state) {
      this._router.navigate(['/user/login']);
    }
  }

  /**
   * Get an observable of the logged in state.
   *
   * @returns login state observable
   */
  public get loginUpdate(): Subject<boolean> {
    return this._loginUpdate;
  }
  /**
   * Get the current user information.
   *
   * @returns user information or undefined
   */
  public get userInfo() : IUser | undefined {
    return this._userInfo
  }
  /**
   * Get the current logged in status
   *
   * @returns current logged in status
   */
  public get loggedIn() : boolean {
    return this._loggedIn;
  }

  /**
   * Check if the current user is an admin
   */
  public get isAdmin() : boolean {
    return this._userInfo?.admin === 1 ? true : false;
  }


}

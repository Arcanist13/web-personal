import { Injectable } from '@angular/core';
import { AuthConfig, OAuthService } from 'angular-oauth2-oidc';
import { ITokenUser, IUser } from 'src/app/shared/models/user.model';
import { environment } from 'src/environments/environment';

/**
 * Provides OAuth2 authentication services to the application.
 *
 * https://manfredsteyer.github.io/angular-oauth2-oidc/docs/
 */
@Injectable({
  providedIn: 'root'
})
export class AuthService {

  private _authCodeFlowConfig: AuthConfig = {
    tokenEndpoint: environment.backendUri + '/token',
    userinfoEndpoint: environment.backendUri + '/users/me',
    clientId: 'web-ui',
    dummyClientSecret: 'geheim',
    scope: 'openid profile',
    oidc: false,
    showDebugInformation: true,
    sessionChecksEnabled: false,
    requireHttps: false
  };

  constructor(
    private _oAuthService: OAuthService,
  ) {
    // Configure the oauth service
    this._oAuthService.configure(this._authCodeFlowConfig);
    this._oAuthService.setStorage(localStorage);
  }

  /**
   * Login the current user to the oauth service, if a username and password are not
   * provided it will attempt to load an existing profile from storage.
   *
   * @param username  user username
   * @param password  user password
   * @returns         login result
   */
  async login(username?: string, password?: string): Promise<{info: IUser}> {
    if (username !== undefined && password !== undefined) {
      const res: ITokenUser = await this._oAuthService.fetchTokenUsingPasswordFlowAndLoadUserProfile(username, password) as ITokenUser;
      return res;
    }
    return this._oAuthService.loadUserProfile() as Promise<{info: IUser}>;
  }

  /**
   * Log the user out of the oauth service.
   *
   * @returns logout result
   */
  async logout(): Promise<void> {
    return this._oAuthService.logOut();
  }

  /**
   * Get the information for the current logged in user.
   *
   * @returns user information
   */
  getCurrentUserInfo(): IUser {
    return this._oAuthService.getIdentityClaims() as IUser;
  }
}

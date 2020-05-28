import React, { Component } from 'react';


class Sidebar extends React.Component {

    render() {


        return (

            <div className="fixed-plugin">
                <div className="dropdown show-dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i className="fa fa-cog fa-2x"> </i>
                    </a>
                    <ul className="dropdown-menu">
                        <li className="header-title"> Sidebar Filters</li>
                        <li className="adjustments-line">
                            <a href="javascript:void(0)" className="switch-trigger active-color">
                                <div className="badge-colors ml-auto mr-auto">
                                    <span className="badge filter badge-purple" data-color="purple"/>
                                    <span className="badge filter badge-azure" data-color="azure"/>
                                    <span className="badge filter badge-green" data-color="green"/>
                                    <span className="badge filter badge-warning" data-color="orange"/>
                                    <span className="badge filter badge-danger" data-color="danger"/>
                                    <span className="badge filter badge-rose active" data-color="rose"/>
                                </div>
                                <div className="clearfix"/>
                            </a>
                        </li>
                        <li className="header-title">Sidebar Background</li>
                        <li className="adjustments-line">
                            <a href="javascript:void(0)" className="switch-trigger background-color">
                                <div className="ml-auto mr-auto">
                                    <span className="badge filter badge-black active"
    data-background-color="black"/>
                                    <span className="badge filter badge-white" data-background-color="white"/>
                                    <span className="badge filter badge-red" data-background-color="red"/>
                                </div>
                                <div className="clearfix"/>
                            </a>
                        </li>
                        <li className="adjustments-line">
                            <a href="javascript:void(0)" className="switch-trigger">
                                <p>Sidebar Mini</p>
                                <label className="ml-auto">
                                    <div className="togglebutton switch-sidebar-mini">
                                        <label>
                                            <input type="checkbox" />
                                                <span className="toggle"/>
                                        </label>
                                    </div>
                                </label>
                                <div className="clearfix"/>
                            </a>
                        </li>
                        <li className="adjustments-line">
                            <a href="javascript:void(0)" className="switch-trigger">
                                <p>Sidebar Images</p>
                                <label className="switch-mini ml-auto">
                                    <div className="togglebutton switch-sidebar-image">
                                        <label>
                                            <input type="checkbox" checked="" />
                                                <span className="toggle"/>
                                        </label>
                                    </div>
                                </label>
                                <div className="clearfix"/>
                            </a>
                        </li>
                        <li className="header-title">Images</li>
                        <li className="active">
                            <a className="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="coopfon/img/sidebar-1.jpg" alt="" />
                            </a>
                        </li>
                        <li>
                            <a className="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="coopfon/img/sidebar-2.jpg" alt="" />
                            </a>
                        </li>
                        <li>
                            <a className="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="coopfon/img/sidebar-3.jpg" alt="" />
                            </a>
                        </li>
                        <li>
                            <a className="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="coopfon/img/sidebar-4.jpg" alt="" />
                            </a>
                        </li>
                        <li className="button-container">
                            <a href="https://www.coopfon.com/"
                               target="_blank" className="btn btn-rose btn-block btn-fill">Buy Now</a>
                            <a href="https://coopfon.com/docs/"
                               target="_blank" className="btn btn-default btn-block">
                                Documentation
                            </a>
                            <a href="https://www.coopfon.com/product/" target="_blank"
                               className="btn btn-info btn-block">
                                Get Free Demo!
                            </a>
                        </li>
                        <li className="button-container github-star">
                            <a className="github-button"
                               href="https://github.com/coopfon/"
                               data-icon="octicon-star" data-size="large" data-show-count="true"
                               aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                        </li>
                        <li className="header-title">Thank you for 95 shares!</li>
                        <li className="button-container text-center">
                            <button id="twitter" className="btn btn-round btn-twitter"><i className="fa fa-twitter"/> &middot; 45
                            </button>
                            <button id="facebook" className="btn btn-round btn-facebook"><i className="fa fa-facebook-f"/> &middot; 50
                            </button>
                            <br />
                                <br />
                        </li>
                    </ul>
                </div>
            </div>

        );
    }

};

export default Sidebar;

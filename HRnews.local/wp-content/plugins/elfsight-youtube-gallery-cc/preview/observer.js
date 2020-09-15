(function(window){"use strict";(function(eapps) {

    var colorSchemes = {
        'default': {
            colorHeaderBg: 'rgb(250, 250, 250)',
            colorHeaderBannerOverlay: 'rgba(255, 255, 255, 0.92)',
            colorHeaderChannelName: 'rgb(17, 17, 17)',
            colorHeaderChannelNameHover: 'rgb(17, 17, 17)',
            colorHeaderChannelDescription: 'rgb(17, 17, 17)',
            colorHeaderAnchor: 'rgb(17, 17, 17)',
            colorHeaderAnchorHover: 'rgb(17, 17, 17)',
            colorHeaderCounters: 'rgba(17, 17, 17, 0.7)',

            colorGroupsBg: 'rgb(250, 250, 250)',
            colorGroupsLink: 'rgb(17, 17, 17, 0.5)',
            colorGroupsLinkHover: 'rgb(17, 17, 17)',
            colorGroupsLinkActive: 'rgb(17, 17, 17)',
            colorGroupsHighlightHover: 'rgb(17, 17, 17)',
            colorGroupsHighlightActive: 'rgb(17, 17, 17)',

            colorContentBg: 'rgb(255, 255, 255)',
            colorContentArrows: 'rgb(255, 255, 255)',
            colorContentArrowshover: 'rgb(255, 0, 0)',
            colorContentArrowsBg: 'rgba(255, 255, 255, 0.8)',
            colorContentArrowsBgHover: 'rgba(255, 255, 255, 1)',
            colorContentScrollbarBg: 'rgb(204, 204, 204)',
            colorContentScrollbarSliderBg: 'rgba(0, 0, 0, 0.4)',

            colorVideoBg: 'rgb(255, 255, 255)',
            colorVideoOverlay: 'rgba(255, 255, 255, 0.95)',
            colorVideoPlayIcon: 'rgba(255, 255, 255, 0.4)',
            colorVideoPlayIconHover: 'rgba(255, 255, 255, 0.8)',
            colorVideoDuration: 'rgb(255, 255, 255)',
            colorVideoDurationBg: 'rgba(34, 34, 34, 0.81)',
            colorVideoTitle: 'rgb(17, 17, 17)',
            colorVideoTitleHover: 'rgb(17, 17, 17)',
            colorVideoDate: 'rgba(17, 17, 17, 0.7)',
            colorVideoDescription: 'rgb(17, 17, 17)',
            colorVideoAnchor: 'rgb(26, 137, 222)',
            colorVideoAnchorHover: 'rgb(47, 165, 255)',
            colorVideoCounters: 'rgba(17, 17, 17, 0.7)',

            colorPopupBg: 'rgb(255, 255, 255)',
            colorPopupOverlay: 'rgba(0, 0, 0, 0.7)',
            colorPopupTitle: 'rgb(17, 17, 17)',
            colorPopupChannelName: 'rgb(17, 17, 17)',
            colorPopupChannelNameHover: 'rgb(17, 17, 17)',
            colorPopupViewsCounter: 'rgba(17, 17, 17, 0.7)',
            colorPopupLikesRatio: 'rgb(47, 165, 255)',
            colorPopupDislikesRatio: 'rgb(207, 207, 207)',
            colorPopupLikesCounter: 'rgba(17, 17, 17, 0.5)',
            colorPopupDislikesCounter: 'rgba(17, 17, 17, 0.5)',
            colorPopupShare: 'rgba(17, 17, 17, 0.5)',
            colorPopupDate: 'rgb(17, 17, 17)',
            colorPopupDescription: 'rgb(17, 17, 17)',
            colorPopupAnchor: 'rgb(26, 137, 222)',
            colorPopupAnchorHover: 'rgb(47, 165, 255)',
            colorPopupDescriptionMoreButton: 'rgba(17, 17, 17, 0.5)',
            colorPopupDescriptionMoreButtonHover: 'rgba(17, 17, 17, 0.7)',
            colorPopupCommentsUsername: 'rgb(17, 17, 17)',
            colorPopupCommentsUsernameHover: 'rgb(17, 17, 17)',
            colorPopupCommentsPassedTime: 'rgb(115, 115, 115)',
            colorPopupCommentsText: 'rgb(17, 17, 17)',
            colorPopupCommentsLikes: 'rgb(180, 180, 180)',
            colorPopupControls: 'rgb(160, 160, 160)',
            colorPopupControlsHover: 'rgb(220, 220, 220)',
            colorPopupControlsMobile: 'rgb(220, 220, 220)',
            colorPopupControlsMobileBg: 'rgba(255, 255, 255, 0)'
        },
        'dark': {
            colorHeaderBg: 'rgb(51, 51, 51)',
            colorHeaderBannerOverlay: 'rgba(51, 51, 51, 0.81)',
            colorHeaderChannelName: 'rgb(255, 255, 255)',
            colorHeaderChannelNameHover: 'rgb(77, 178, 255)',
            colorHeaderChannelDescription: 'rgb(255, 255, 255)',
            colorHeaderAnchor: 'rgb(77, 178, 255)',
            colorHeaderAnchorHover: 'rgb(255, 255, 255)',
            colorHeaderCounters: 'rgb(160, 160, 160)',

            colorGroupsBg: 'rgb(51, 51, 51)',
            colorGroupsLink: 'rgb(255, 255, 255, 0.5)',
            colorGroupsLinkHover: 'rgb(255, 255, 255)',
            colorGroupsLinkActive: 'rgb(255, 66, 66)',
            colorGroupsHighlight: 'rgb(85, 85, 85)',
            colorGroupsHighlightHover: 'rgb(255, 66, 66)',
            colorGroupsHighlightActive: 'rgb(255, 66, 66)',

            colorContentBg: 'rgb(51, 51, 51)',
            colorContentArrows: 'rgb(34, 34, 34)',
            colorContentArrowsHover: 'rgb(255, 0, 0)',
            colorContentArrowsBg: 'rgba(255, 255, 255, 0.4)',
            colorContentArrowsBgHover: 'rgba(255, 255, 255, 0.8)',
            colorContentScrollbarBg: 'rgb(85, 85, 85)',
            colorContentScrollbarSliderBg: 'rgba(255, 255, 255, 0.4)',

            colorVideoBg: 'rgb(51, 51, 51)',
            colorVideoOverlay: 'rgba(28, 28, 28, 0.9)',
            colorVideoPlayIcon: 'rgba(255, 255, 255, 0.4)',
            colorVideoPlayIconHover: 'rgba(255, 255, 255, 0.8)',
            colorVideoDuration: 'rgb(255, 255, 255)',
            colorVideoDurationBg: 'rgba(28, 28, 28, 0.81)',
            colorVideoTitle: 'rgb(200, 200, 200)',
            colorVideoTitleHover: 'rgb(200, 200, 200)',
            colorVideoDate: 'rgb(116, 116, 116)',
            colorVideoDescription: 'rgb(200, 200, 200)',
            colorVideoAnchor: 'rgb(42, 163, 255)',
            colorVideoAnchorHover: 'rgb(77, 178, 255)',
            colorVideoCounters: 'rgb(112, 112, 112)',

            colorPopupBg: 'rgb(51, 51, 51)',
            colorPopupOverlay: 'rgba(0, 0, 0, 0.7)',
            colorPopupTitle: 'rgb(255, 255, 255)',
            colorPopupChannelName: 'rgb(255, 255, 255)',
            colorPopupChannelNameHover: 'rgb(77, 178, 255)',
            colorPopupViewsCounter: 'rgb(255, 255, 255)',
            colorPopupLikesRatio: 'rgb(47, 165, 255)',
            colorPopupDislikesRatio: 'rgb(100, 100, 100)',
            colorPopupLikesCounter: 'rgb(144, 144, 144)',
            colorPopupDislikesCounter: 'rgb(144, 144, 144)',
            colorPopupShare: 'rgb(144, 144, 144)',
            colorPopupDate: 'rgb(255, 255, 255)',
            colorPopupDescription: 'rgb(255, 255, 255)',
            colorPopupAnchor: 'rgb(42, 163, 255)',
            colorPopupAnchorHover: 'rgb(77, 178, 255)',
            colorPopupDescriptionMoreButton: 'rgb(120, 120, 120)',
            colorPopupDescriptionMoreButtonHover: 'rgb(255, 255, 255)',
            colorPopupCommentsUsername: 'rgb(255, 255, 255)',
            colorPopupCommentsUsernameHover: 'rgb(77, 178, 255)',
            colorPopupCommentsPassedTime: 'rgb(116, 116, 116)',
            colorPopupCommentsText: 'rgb(255, 255, 255)',
            colorPopupCommentsLikes: 'rgb(116, 116, 116)',
            colorPopupControls: 'rgb(160, 160, 160)',
            colorPopupControlsHover: 'rgb(220, 220, 220)',
            colorPopupControlsMobile: 'rgb(220, 220, 220)',
            colorPopupControlsMobileBg: 'rgba(255, 255, 255, 0)'
        },
        'red': {
            colorHeaderBg: 'rgb(197, 17, 9)',
            colorHeaderBannerOverlay: 'rgb(197, 17, 9)',
            colorHeaderChannelName: 'rgb(255, 255, 255)',
            colorHeaderChannelNameHover: 'rgba(255, 255, 255, 0.9)',
            colorHeaderChannelDescription: 'rgb(255, 255, 255)',
            colorHeaderAnchor: 'rgba(255, 255, 255, 0.9)',
            colorHeaderAnchorHover: 'rgb(255, 255, 255)',
            colorHeaderCounters: 'rgba(255, 255, 255, 0.6)',

            colorGroupsBg: 'rgb(230, 33, 23)',
            colorGroupsLink: 'rgba(255, 255, 255, 0.6)',
            colorGroupsLinkHover: 'rgba(255, 255, 255, 0.8)',
            colorGroupsLinkActive: 'rgb(255, 255, 255)',
            colorGroupsHighlight: 'rgba(255, 255, 255, 0.4)',
            colorGroupsHighlightHover: 'rgb(255, 255, 255)',
            colorGroupsHighlightActive: 'rgb(255, 255, 255)',

            colorContentBg: 'rgb(255, 255, 255)',
            colorContentArrows: 'rgb(255, 255, 255)',
            colorContentArrowshover: 'rgb(0, 198, 255)',
            colorContentArrowsBg: 'rgba(0, 0, 0, 0.7)',
            colorContentArrowsBgHover: 'rgba(0, 0, 0, 0.95)',
            colorContentScrollbarBg: 'rgb(223, 223, 223)',
            colorContentScrollbarSliderBg: 'rgba(133, 133, 133, 0.4)',

            colorVideoBg: 'rgb(255, 255, 255)',
            colorVideoOverlay: 'rgba(255, 255, 255, 0.95)',
            colorVideoPlayIcon: 'rgba(255, 255, 255, 0.4)',
            colorVideoPlayIconHover: 'rgba(255, 255, 255, 0.8)',
            colorVideoDuration: 'rgb(209, 238, 246)',
            colorVideoDurationBg: 'rgba(5, 25, 43, 0.81)',
            colorVideoTitle: 'rgb(0, 0, 0)',
            colorVideoTitleHover: 'rgb(255, 26, 54)',
            colorVideoDate: 'rgb(177, 177, 177)',
            colorVideoDescription: 'rgb(80, 80, 80)',
            colorVideoAnchor: 'rgb(255, 26, 54)',
            colorVideoAnchorHover: 'rgb(0, 0, 0)',
            colorVideoCounters: 'rgb(177, 177, 177)',

            colorPopupBg: 'rgb(255, 255, 255)',
            colorPopupOverlay: 'rgba(12, 2, 2, 0.8)',
            colorPopupTitle: 'rgb(0, 0, 0)',
            colorPopupChannelName: 'rgb(0, 0, 0)',
            colorPopupChannelNameHover: 'rgb(255, 26, 54)',
            colorPopupViewsCounter: 'rgb(85, 85, 85)',
            colorPopupLikesRatio: 'rgb(47, 165, 255)',
            colorPopupDislikesRatio: 'rgb(207, 207, 207)',
            colorPopupLikesCounter: 'rgb(144, 144, 144)',
            colorPopupDislikesCounter: 'rgb(144, 144, 144)',
            colorPopupShare: 'rgb(144, 144, 144)',
            colorPopupDate: 'rgb(80, 80, 80)',
            colorPopupDescription: 'rgb(80, 80, 80)',
            colorPopupAnchor: 'rgb(255, 26, 54)',
            colorPopupAnchorHover: 'rgb(0, 0, 0)',
            colorPopupDescriptionMoreButton: 'rgb(177, 177, 177)',
            colorPopupDescriptionMoreButtonHover: 'rgb(80, 80, 80)',
            colorPopupCommentsUsername: 'rgb(0, 0, 0)',
            colorPopupCommentsUsernameHover: 'rgb(255, 26, 54)',
            colorPopupCommentsPassedTime: 'rgb(177, 177, 177)',
            colorPopupCommentsText: 'rgb(80, 80, 80)',
            colorPopupCommentsLikes: 'rgb(180, 180, 180)',
            colorPopupControls: 'rgb(160, 160, 160)',
            colorPopupControlsHover: 'rgb(220, 220, 220)',
            colorPopupControlsMobile: 'rgb(220, 220, 220)',
            colorPopupControlsMobileBg: 'rgba(255, 255, 255, 0)'
        },
        'deep-blue': {
            colorHeaderBg: 'rgb(50, 81, 108)',
            colorHeaderBannerOverlay: 'rgba(50, 81, 108, 0.81)',
            colorHeaderChannelName: 'rgb(255, 255, 255)',
            colorHeaderChannelNameHover: 'rgb(98, 220, 255)',
            colorHeaderChannelDescription: 'rgb(209, 238, 246)',
            colorHeaderAnchor: 'rgb(98, 220, 255)',
            colorHeaderAnchorHover: 'rgb(255, 255, 255)',
            colorHeaderCounters: 'rgb(140, 170, 197)',

            colorGroupsBg: 'rgb(33, 56, 75)',
            colorGroupsLink: 'rgb(255, 255, 255, 0.5)',
            colorGroupsLinkHover: 'rgb(255, 255, 255)',
            colorGroupsLinkActive: 'rgb(98, 220, 255)',
            colorGroupsHighlight: 'rgb(50, 81, 108)',
            colorGroupsHighlightHover: 'rgb(0, 198, 255)',
            colorGroupsHighlightActive: 'rgb(0, 198, 255)',

            colorContentBg: 'rgb(33, 56, 75)',
            colorContentArrows: 'rgb(255, 255, 255)',
            colorContentArrowsHover: 'rgb(0, 198, 255)',
            colorContentArrowsBg: 'rgba(0, 0, 0, 0.7)',
            colorContentArrowsBgHover: 'rgba(0, 0, 0, 0.95)',
            colorContentScrollbarBg: 'rgb(50, 81, 108)',
            colorContentScrollbarSliderBg: 'rgb(66, 114, 156)',

            colorVideoBg: 'rgb(33, 56, 75)',
            colorVideoOverlay: 'rgba(5, 25, 43, 0.9)',
            colorVideoPlayIcon: 'rgba(255, 255, 255, 0.4)',
            colorVideoPlayIconHover: 'rgba(255, 255, 255, 0.8)',
            colorVideoDuration: 'rgb(209, 238, 246)',
            colorVideoDurationBg: 'rgba(5, 25, 43, 0.81)',
            colorVideoTitle: 'rgb(0, 198, 255)',
            colorVideoTitleHover: 'rgb(255, 255, 255)',
            colorVideoDate: 'rgba(90, 130, 165, 1)',
            colorVideoDescription: 'rgb(209, 238, 246)',
            colorVideoAnchor: 'rgb(0, 198, 255)',
            colorVideoAnchorHover: 'rgb(255, 255, 255)',
            colorVideoCounters: 'rgba(90, 130, 165, 1)',

            colorPopupBg: 'rgb(33, 56, 75)',
            colorPopupOverlay: 'rgba(4, 17, 28, 0.8)',
            colorPopupTitle: 'rgb(255, 255, 255)',
            colorPopupChannelName: 'rgb(255, 255, 255)',
            colorPopupChannelNameHover: 'rgb(0, 198, 255)',
            colorPopupViewsCounter: 'rgb(255, 255, 255)',
            colorPopupLikesRatio: 'rgb(44, 138, 218)',
            colorPopupDislikesRatio: 'rgb(51, 79, 102)',
            colorPopupLikesCounter: 'rgba(90, 130, 165, 1)',
            colorPopupDislikesCounter: 'rgba(90, 130, 165, 1)',
            colorPopupShare: 'rgba(90, 130, 165, 1)',
            colorPopupDate: 'rgba(90, 130, 165, 1)',
            colorPopupDescription: 'rgb(209, 238, 246)',
            colorPopupAnchor: 'rgb(0, 198, 255)',
            colorPopupAnchorHover: 'rgb(255, 255, 255)',
            colorPopupDescriptionMoreButton: 'rgba(90, 130, 165, 1)',
            colorPopupDescriptionMoreButtonHover: 'rgb(209, 238, 246)',
            colorPopupCommentsUsername: 'rgb(255, 255, 255)',
            colorPopupCommentsUsernameHover: 'rgb(0, 198, 255)',
            colorPopupCommentsPassedTime: 'rgba(90, 130, 165, 1)',
            colorPopupCommentsText: 'rgb(209, 238, 246)',
            colorPopupCommentsLikes: 'rgba(90, 130, 165, 1)',
            colorPopupControls: 'rgb(68, 107, 140)',
            colorPopupControlsHover: 'rgb(0, 198, 255)',
            colorPopupControlsMobile: 'rgb(68, 107, 140)',
            colorPopupControlsMobileBg: 'rgb(33, 56, 75)'
        },
        'custom': {

        }
    };

    var colorKeys = ['colorHeaderBg', 'colorHeaderBannerOverlay', 'colorHeaderChannelName', 'colorHeaderChannelNameHover', 'colorHeaderChannelDescription', 'colorHeaderAnchor', 'colorHeaderAnchorHover', 'colorHeaderCounters', 'colorGroupsBg', 'colorGroupsLink', 'colorGroupsLinkHover', 'colorGroupsLinkActive', 'colorGroupsHighlight', 'colorGroupsHighlightHover', 'colorGroupsHighlightActive', 'colorContentBg', 'colorContentArrows', 'colorContentArrowsHover', 'colorContentArrowsBg', 'colorContentArrowsBgHover', 'colorContentScrollbarBg', 'colorContentScrollbarSliderBg', 'colorVideoBg', 'colorVideoOverlay', 'colorVideoPlayIcon', 'colorVideoPlayIconHover', 'colorVideoDuration', 'colorVideoDurationBg', 'colorVideoTitle', 'colorVideoTitleHover', 'colorVideoDate', 'colorVideoDescription', 'colorVideoAnchor', 'colorVideoAnchorHover', 'colorVideoCounters', 'colorPopupBg', 'colorPopupOverlay', 'colorPopupTitle', 'colorPopupChannelName', 'colorPopupChannelNameHover', 'colorPopupViewsCounter', 'colorPopupLikesRatio', 'colorPopupDislikesRatio', 'colorPopupLikesCounter', 'colorPopupDislikesCounter', 'colorPopupDate', 'colorPopupDescription', 'colorPopupAnchor', 'colorPopupAnchorHover', 'colorPopupDescriptionMoreButton', 'colorPopupDescriptionMoreButtonHover', 'colorPopupCommentsUsername', 'colorPopupCommentsUsernameHover', 'colorPopupCommentsPassedTime', 'colorPopupCommentsText', 'colorPopupCommentsLikes', 'colorPopupControls', 'colorPopupControlsHover', 'colorPopupControlsMobile', 'colorPopupControlsMobileBg'];
    var watchColorKeys = [];
    for (var i = 0, j = colorKeys.length; i < j; i++) {
        watchColorKeys.push('widget.data.' + colorKeys[i]);
    }
    var watchColorTimer;
    var customPrestine = true;
    var colorSchemeChanging = false;

    eapps.observer = function($scope, properties) {
        $scope.$watch('widget.data.colorScheme', function(newValue, oldValue) {
            if (newValue !== undefined && newValue !== oldValue && newValue in colorSchemes) {
                angular.extend($scope.widget.data, colorSchemes[newValue]);
                colorSchemeChanging = true;
            }
        });

        $scope.$watchGroup(watchColorKeys, function(newValues, oldValues) {
            if (!colorSchemeChanging) {
                customPrestine = false;
            }

            clearTimeout(watchColorTimer);

            watchColorTimer = setTimeout(function() {
                if (newValues !== undefined && newValues !== oldValues) {
                    // don't change the custom scheme colors if any color was changed before
                    if ((customPrestine && colorSchemeChanging) || (!customPrestine && !colorSchemeChanging)) {
                        for (var i = 0, j = colorKeys.length; i < j; i++) {
                            colorSchemes['custom'][colorKeys[i]] = newValues[i];
                        }
                    }

                    if (!colorSchemeChanging && $scope.widget.data.colorScheme !== 'custom') {
                        $scope.widget.data.colorScheme = 'custom';
                    }

                    colorSchemeChanging = false;
                }
            }, 300);
        });
    };

})(window.eapps = window.eapps || {});})(window)
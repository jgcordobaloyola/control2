import React, {StyleSheet, Dimensions, PixelRatio} from "react-native";
const {width, height, scale} = Dimensions.get("window"),
    vw = width / 100,
    vh = height / 100,
    vmin = Math.min(vw, vh),
    vmax = Math.max(vw, vh);

export default StyleSheet.create({
    "wrapper": {
        "marginTop": 80,
        "marginBottom": 20
    },
    "form-signin": {
        "maxWidth": 420,
        "paddingTop": 30,
        "paddingRight": 38,
        "paddingBottom": 66,
        "paddingLeft": 38,
        "marginTop": 0,
        "marginRight": "auto",
        "marginBottom": 0,
        "marginLeft": "auto",
        "backgroundColor": "#eee",
        "border": "3px dotted rgba(0,0,0,0.1)"
    },
    "form-signin-heading": {
        "textAlign": "center",
        "marginBottom": 30
    },
    "form-control": {
        "position": "relative",
        "fontSize": 16,
        "height": "auto",
        "paddingTop": 10,
        "paddingRight": 10,
        "paddingBottom": 10,
        "paddingLeft": 10
    },
    "input[type=\"text\"]": {
        "marginBottom": 0,
        "borderBottomLeftRadius": 0,
        "borderBottomRightRadius": 0
    },
    "input[type=\"password\"]": {
        "marginBottom": 20,
        "borderTopLeftRadius": 0,
        "borderTopRightRadius": 0
    },
    "colorgraph": {
        "height": 7,
        "borderTop": 0,
        "background": "#c4e17f",
        "borderRadius": 5,
        "backgroundImage": "linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4)"
    }
});
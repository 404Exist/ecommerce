import route from 'ziggy-js'
import { Ziggy } from './ziggy'

export default function (name, params, absolute) {
    return route(name, params, absolute, Ziggy)
}

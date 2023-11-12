var expect = require('chai').expect
var gatherNamesOf = require('./../mocha.js')

describe('gatherNamesOf', function () {
    var people,
        gatherNamesOf
        beforeEach (function () {
            people = [{name: 'Gunter'}, {name: 'Marcelline'},{name: 'Simon'}]
        })

        it('should return an array', function(){
            expect(names).to.be.an('array')
        })
        it('should give me output the same length as the input', function(){
            expect(names.length).to.equal(people.length)
        })
        it('should give me the same of the object passed in', function(){
            expect(names[0]).to.equal(people[0].name)
        })

})